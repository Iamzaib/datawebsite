<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyEmailRequest;
use App\Http\Requests\StoreEmailRequest;
use App\Http\Requests\UpdateEmailRequest;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\Email;
use App\Models\EmailsToList;
use App\Models\JobPosition;
use App\Models\ListFilters;
use App\Models\Lists;
use App\Models\State;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmailsController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('email_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if(isset($request->list_id)&&is_numeric($request->list_id)){
            $FilteremailFromLists=ListFilters::where('list_id',(int)$request->list_id)->get();
            foreach ($FilteremailFromLists as $filters){
                $where[$filters->filter_title]=$filters->filter_value;
            }
            $list=Lists::find($request->list_id);
            $emails = Email::where($where)->with(['company_name', 'job_level', 'country', 'state', 'city'])->get();
        }else{
            $list='';
            $emails = Email::with(['company_name', 'job_level', 'country', 'state', 'city'])->get();
        }


        $companies = Company::get();

        $job_positions = JobPosition::get();

        $countries = Country::get();

        $states = State::get();

        $cities = City::get();

        return view('admin.emails.index', compact('emails', 'companies', 'job_positions', 'countries', 'states', 'cities','list'));
    }

    public function create()
    {
        abort_if(Gate::denies('email_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $company_names = Company::pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $job_levels = JobPosition::pluck('job_title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $countries = Country::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $states = State::pluck('state_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cities = City::pluck('city_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.emails.create', compact('company_names', 'job_levels', 'countries', 'states', 'cities'));
    }

    public function store(StoreEmailRequest $request)
    {
        $email = Email::create($request->all());

        return redirect()->route('admin.emails.index');
    }

    public function edit(Email $email)
    {
        abort_if(Gate::denies('email_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $company_names = Company::pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $job_levels = JobPosition::pluck('job_title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $countries = Country::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $states = State::pluck('state_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cities = City::pluck('city_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $email->load('company_name', 'job_level', 'country', 'state', 'city');

        return view('admin.emails.edit', compact('company_names', 'job_levels', 'countries', 'states', 'cities', 'email'));
    }

    public function update(UpdateEmailRequest $request, Email $email)
    {
        $email->update($request->all());

        return redirect()->route('admin.emails.index');
    }

    public function show(Email $email)
    {
        abort_if(Gate::denies('email_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $email->load('company_name', 'job_level', 'country', 'state', 'city');

        return view('admin.emails.show', compact('email'));
    }

    public function destroy(Email $email)
    {
        abort_if(Gate::denies('email_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $email->delete();

        return back();
    }

    public function massDestroy(MassDestroyEmailRequest $request)
    {
        Email::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
