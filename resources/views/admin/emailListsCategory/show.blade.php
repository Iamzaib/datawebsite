@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.listcategory.title_singular') }}
            </a>
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route("admin.listcategorys.index") }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.listcategory.fields.id') }}
                        </th>
                        <td>
                            {{ $listcategory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listcategory.fields.listCategory_title') }}
                        </th>
                        <td>
                            {{ $listcategory->listCategory_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listcategory.fields.listCategory_details') }}
                        </th>
                        <td>
                            {!! $listcategory->listCategory_details!!}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.listcategorys.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
