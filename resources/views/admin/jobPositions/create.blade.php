@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.jobPosition.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.job-positions.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="job_title">{{ trans('cruds.jobPosition.fields.job_title') }}</label>
                    <input class="form-control {{ $errors->has('job_title') ? 'is-invalid' : '' }}" type="text" name="job_title" id="job_title" value="{{ old('job_title', '') }}" required>
                    @if($errors->has('job_title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('job_title') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.jobPosition.fields.job_title_helper') }}</span>
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
