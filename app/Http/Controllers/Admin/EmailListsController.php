<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyEmailListRequest;
use App\Http\Requests\StoreEmailListRequest;
use App\Http\Requests\UpdateEmailListRequest;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\Email;
use App\Models\EmailsToList;
use App\Models\JobPosition;
use App\Models\ListFilters;
use App\Models\Lists as EmailList;
use App\Models\ListsCategory;
use App\Models\State;
use App\Models\User;
use Gate;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use stdClass;
use Symfony\Component\HttpFoundation\Response;

class EmailListsController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('email_list_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $emailLists = EmailList::with(['list_maker','list_category'])->get();

        $users = User::get();

        return view('admin.emailLists.index', compact('emailLists', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('email_list_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $list_categories = ListsCategory::pluck('listCategory_title', 'id')->prepend(trans('global.pleaseSelect'), '');
        $company_names = Company::pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $job_levels = JobPosition::pluck('job_title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $countries = Country::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $states = State::pluck('state_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cities = City::pluck('city_name', 'id')->prepend(trans('global.pleaseSelect'), '');
        return view('admin.emailLists.create',compact( 'company_names', 'job_levels', 'countries', 'states', 'cities','list_categories'));
    }

    public function store(StoreEmailListRequest $request)
    {
        //print_r($request->all());exit;

        $request->merge([
            'list_maker_id' => Auth::id()
        ]);
        $emailList = EmailList::create($request->all());
        $where=array();
        if(isset($request->record_type)){
            $where['record_type']=$request->record_type;
            ListFilters::create(array('list_id'=>$emailList->id,'filter_title'=>'record_type','filter_value'=>$request->record_type));
        }
        if(isset($request->company_name_id)){
            $where['company_name_id']=$request->company_name_id;
            ListFilters::create(array('list_id'=>$emailList->id,'filter_title'=>'company_name_id','filter_value'=>$request->company_name_id));
        }
        if(isset($request->job_level_id)){
            $where['job_level_id']=$request->job_level_id;
            ListFilters::create(array('list_id'=>$emailList->id,'filter_title'=>'job_level_id','filter_value'=>$request->job_level_id));
        }
        if(isset($request->country_id)){
            $where['country_id']=$request->country_id;
            ListFilters::create(array('list_id'=>$emailList->id,'filter_title'=>'country_id','filter_value'=>$request->country_id));
        }
        if(isset($request->state_id)){
            $where['state_id']=$request->state_id;
            ListFilters::create(array('list_id'=>$emailList->id,'filter_title'=>'state_id','filter_value'=>$request->state_id));
        }
        if(isset($request->city_id)){
            $where['city_id']=$request->city_id;
            ListFilters::create(array('list_id'=>$emailList->id,'filter_title'=>'city_id','filter_value'=>$request->city_id));
        }
        if(count($where)>0){
            $emails_get=Email::where($where)->get();
            foreach ($emails_get as $mail){
                EmailsToList::create(['list_id'=>$emailList->id,'email_id'=>$mail->id]);
            }
            $emailList->update(['total_emails_in_list'=>count($emails_get)]);
        }


        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $emailList->id]);
        }

        return redirect()->route('admin.email-lists.index');
    }

    public function edit(EmailList $emailList)
    {
        abort_if(Gate::denies('email_list_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $list_categories = ListsCategory::pluck('listCategory_title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $company_names = Company::pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $job_levels = JobPosition::pluck('job_title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $countries = Country::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $states = State::pluck('state_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cities = City::pluck('city_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $emailList->load('list_maker');
        $listFilters=ListFilters::where('list_id',$emailList->id)->get();
        $filter=new stdClass();
        foreach ($listFilters as $filters){
            $filter->{$filters->filter_title}=$filters->filter_value;
        }

        return view('admin.emailLists.edit', compact('emailList','company_names', 'job_levels', 'countries', 'states', 'cities','filter','list_categories'));
    }

    public function update(UpdateEmailListRequest $request, EmailList $emailList)
    {
        $emailList->update($request->all());
        $where=array();
        if(isset($request->record_type)){
            $where['record_type']=$request->record_type;
            ListFilters::firstOrCreate(array('list_id'=>$emailList->id,'filter_title'=>'record_type','filter_value'=>$request->record_type));
        }
        if(isset($request->company_name_id)){
            $where['company_name_id']=$request->company_name_id;
            ListFilters::firstOrCreate(array('list_id'=>$emailList->id,'filter_title'=>'company_name_id','filter_value'=>$request->company_name_id));
        }
        if(isset($request->job_level_id)){
            $where['job_level_id']=$request->job_level_id;
            ListFilters::firstOrCreate(array('list_id'=>$emailList->id,'filter_title'=>'job_level_id','filter_value'=>$request->job_level_id));
        }
        if(isset($request->country_id)){
            $where['country_id']=$request->country_id;
            ListFilters::firstOrCreate(array('list_id'=>$emailList->id,'filter_title'=>'country_id','filter_value'=>$request->country_id));
        }
        if(isset($request->state_id)){
            $where['state_id']=$request->state_id;
            ListFilters::firstOrCreate(array('list_id'=>$emailList->id,'filter_title'=>'state_id','filter_value'=>$request->state_id));
        }
        if(isset($request->city_id)){
            $where['city_id']=$request->city_id;
            ListFilters::firstOrCreate(array('list_id'=>$emailList->id,'filter_title'=>'city_id','filter_value'=>$request->city_id));
        }
        if(count($where)>0){
            $emails_get=Email::where($where)->get();
            $mails_done=array();
            foreach ($emails_get as $mail){
                EmailsToList::firstOrCreate(['list_id'=>$emailList->id,'email_id'=>$mail->id]);
                $mails_done[]=$mail->id;
            }
            EmailsToList::whereNotIn('email_id', $mails_done)->delete();
            $emailList->update(['total_emails_in_list'=>count($emails_get)]);
        }
        return redirect()->route('admin.email-lists.index');
    }

    public function show(EmailList $emailList)
    {
        abort_if(Gate::denies('email_list_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $emailList->load('list_maker');
        $listFilters=ListFilters::where('list_id',$emailList->id)->get();
        $filter=new stdClass();
        foreach ($listFilters as $filters){
            $filter->{$filters->filter_title}=$filters->filter_value;
        }

        return view('admin.emailLists.show', compact('emailList','filter'));
    }

    public function destroy(EmailList $emailList)
    {
        abort_if(Gate::denies('email_list_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $emailList->delete();

        return back();
    }

    public function massDestroy(MassDestroyEmailListRequest $request)
    {
        EmailList::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('email_list_create') && Gate::denies('email_list_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new EmailList();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
