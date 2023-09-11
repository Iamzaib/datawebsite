@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.emailList.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.email-lists.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.emailList.fields.id') }}
                        </th>
                        <td>
                            {{ $emailList->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emailList.fields.list_title') }}
                        </th>
                        <td>
                            {{ $emailList->list_title }}
                        </td>
                    </tr>     <tr>
                        <th>
                            {{ trans('cruds.emailList.fields.listCategory_title') }}
                        </th>
                        <td>
                            {{ $emailList->list_category->listCategory_title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emailList.fields.list_details') }}
                        </th>
                        <td>
                            {!! $emailList->list_details !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emailList.fields.list_maker') }}
                        </th>
                        <td>
                            {{ $emailList->list_maker->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emailList.fields.guest_list') }}
                        </th>
                        <td>
                            {{ $emailList->guest_list==1?'Yes':'No' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emailList.fields.total_emails_in_list') }}
                        </th>
                        <td>
                            {{ $emailList->total_emails_in_list }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emailList.fields.list_price') }}
                        </th>
                        <td>
                            {{ $emailList->list_price }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.email-lists.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
