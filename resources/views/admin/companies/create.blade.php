@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.company.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.companies.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="company_name">{{ trans('cruds.company.fields.company_name') }}</label>
                    <input class="form-control {{ $errors->has('company_name') ? 'is-invalid' : '' }}" type="text" name="company_name" id="company_name" value="{{ old('company_name', '') }}" required>
                    @if($errors->has('company_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('company_name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.company.fields.company_name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="company_details">{{ trans('cruds.company.fields.company_details') }}</label>
                    <textarea class="form-control {{ $errors->has('company_details') ? 'is-invalid' : '' }}" name="company_details" id="company_details">{{ old('company_details') }}</textarea>
                    @if($errors->has('company_details'))
                        <div class="invalid-feedback">
                            {{ $errors->first('company_details') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.company.fields.company_details_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required">{{ trans('cruds.company.fields.company_type') }}</label>
                    <select class="form-control {{ $errors->has('company_type') ? 'is-invalid' : '' }}" name="company_type" id="company_type" required>
                        <option value disabled {{ old('company_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach(App\Models\Company::COMPANY_TYPE_SELECT as $key => $label)
                            <option value="{{ $key }}" {{ old('company_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('company_type'))
                        <div class="invalid-feedback">
                            {{ $errors->first('company_type') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.company.fields.company_type_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="founded">{{ trans('cruds.company.fields.founded') }}</label>
                    <input class="form-control {{ $errors->has('founded') ? 'is-invalid' : '' }}" type="text" name="founded" id="founded" value="{{ old('founded', '') }}">
                    @if($errors->has('founded'))
                        <div class="invalid-feedback">
                            {{ $errors->first('founded') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.company.fields.founded_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="employees">{{ trans('cruds.company.fields.employees') }}</label>
                    <input class="form-control {{ $errors->has('employees') ? 'is-invalid' : '' }}" type="text" name="employees" id="employees" value="{{ old('employees', '') }}">
                    @if($errors->has('employees'))
                        <div class="invalid-feedback">
                            {{ $errors->first('employees') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.company.fields.employees_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="revenue">{{ trans('cruds.company.fields.revenue') }}</label>
                    <input class="form-control {{ $errors->has('revenue') ? 'is-invalid' : '' }}" type="text" name="revenue" id="revenue" value="{{ old('revenue', '') }}">
                    @if($errors->has('revenue'))
                        <div class="invalid-feedback">
                            {{ $errors->first('revenue') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.company.fields.revenue_helper') }}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>



@endsection
