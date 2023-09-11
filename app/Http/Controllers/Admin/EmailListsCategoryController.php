<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyEmailListCategoryRequest;
use App\Http\Requests\StoreEmailListCategoryRequest;
use App\Http\Requests\UpdateEmailListCategoryRequest;
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

class EmailListsCategoryController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('email_list_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listCategory = ListsCategory::all();

        return view('admin.emailListsCategory.index', compact('listCategory'));
    }

    public function create()
    {
        abort_if(Gate::denies('email_list_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.emailListsCategory.create');
    }

    public function store(StoreEmailListCategoryRequest $request)
    {
        $emailListCategory = ListsCategory::create($request->all());
        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $emailListCategory->id]);
        }

        return redirect()->route('admin.listcategorys.index');
    }

    public function edit(ListsCategory $listcategory)
    {
        abort_if(Gate::denies('email_list_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.emailListsCategory.edit', compact('listcategory'));
    }

    public function update(UpdateEmailListCategoryRequest $request, ListsCategory $listcategory)
    {
        $listcategory->update($request->all());

        return redirect()->route('admin.listcategorys.index');
    }

    public function show(ListsCategory $listcategory)
    {
        abort_if(Gate::denies('email_list_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.emailListsCategory.show', compact('listcategory'));
    }

    public function destroy(ListsCategory $listcategory)
    {
        abort_if(Gate::denies('email_list_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listcategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyEmailListCategoryRequest $request)
    {
        ListsCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('email_list_create') && Gate::denies('email_list_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ListsCategory();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
