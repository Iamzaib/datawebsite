@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.emailList.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.email-lists.update", [$emailList->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required" for="list_title">{{ trans('cruds.emailList.fields.list_title') }}</label>
                    <input class="form-control {{ $errors->has('list_title') ? 'is-invalid' : '' }}" type="text" name="list_title" id="list_title" value="{{ old('list_title', $emailList->list_title) }}" required>
                    @if($errors->has('list_title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('list_title') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.emailList.fields.list_title_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="list_details">{{ trans('cruds.emailList.fields.list_details') }}</label>
                    <textarea class="form-control ckeditor {{ $errors->has('list_details') ? 'is-invalid' : '' }}" name="list_details" id="list_details">{!! old('list_details', $emailList->list_details) !!}</textarea>
                    @if($errors->has('list_details'))
                        <div class="invalid-feedback">
                            {{ $errors->first('list_details') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.emailList.fields.list_details_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="list_price">{{ trans('cruds.emailList.fields.list_price') }}</label>
                    <input class="form-control {{ $errors->has('list_price') ? 'is-invalid' : '' }}" type="number" name="list_price" id="list_price" value="{{ old('list_price', $emailList->list_price) }}" step="0.01" required>
                    @if($errors->has('list_price'))
                        <div class="invalid-feedback">
                            {{ $errors->first('list_price') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.emailList.fields.list_price_helper') }}</span>
                </div>
                <div class="card-header form-group font-weight-bolder">
                    <h4> {{ trans('cruds.emailList.filterEmails') }}</h4>
                </div>
                <div class="form-group">
                    <label class="required">{{ trans('cruds.email.fields.record_type') }}</label>
                    <select class="form-control {{ $errors->has('record_type') ? 'is-invalid' : '' }}" name="record_type" id="record_type" required>
                        <option value disabled {{ old('record_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach(App\Models\Email::RECORD_TYPE_SELECT as $key => $label)
                            <option value="{{ $key }}" {{ old('record_type', $filter->record_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('record_type'))
                        <div class="invalid-feedback">
                            {{ $errors->first('record_type') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.email.fields.record_type_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="company_name_id">{{ trans('cruds.email.fields.company_name') }}</label>
                    <select class="form-control select2 {{ $errors->has('company_name') ? 'is-invalid' : '' }}" name="company_name_id" id="company_name_id">
                        @foreach($company_names as $id => $entry)
                            <option value="{{ $id }}" {{ (old('company_name_id') ? old('company_name_id') : $filter->company_name_id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('company_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('company_name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.email.fields.company_name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="job_level_id">{{ trans('cruds.email.fields.job_level') }}</label>
                    <select class="form-control select2 {{ $errors->has('job_level') ? 'is-invalid' : '' }}" name="job_level_id" id="job_level_id">
                        @foreach($job_levels as $id => $entry)
                            <option value="{{ $id }}" {{ (old('job_level_id') ? old('job_level_id') : $filter->job_level_id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('job_level'))
                        <div class="invalid-feedback">
                            {{ $errors->first('job_level') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.email.fields.job_level_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="country_id">{{ trans('cruds.email.fields.country') }}</label>
                    <select class="form-control select2 {{ $errors->has('country') ? 'is-invalid' : '' }}" name="country_id" id="country_id">
                        @foreach($countries as $id => $entry)
                            <option value="{{ $id }}" {{ (old('country_id') ? old('country_id') : $filter->country_id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('country'))
                        <div class="invalid-feedback">
                            {{ $errors->first('country') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.email.fields.country_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="state_id">{{ trans('cruds.email.fields.state') }}</label>
                    <select class="form-control select2 {{ $errors->has('state') ? 'is-invalid' : '' }}" name="state_id" id="state_id">
                        @foreach($states as $id => $entry)
                            <option value="{{ $id }}" {{ (old('state_id') ? old('state_id') : $filter->state_id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('state'))
                        <div class="invalid-feedback">
                            {{ $errors->first('state') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.email.fields.state_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="city_id">{{ trans('cruds.email.fields.city') }}</label>
                    <select class="form-control select2 {{ $errors->has('city') ? 'is-invalid' : '' }}" name="city_id" id="city_id">
                        @foreach($cities as $id => $entry)
                            <option value="{{ $id }}" {{ (old('city_id') ? old('city_id') : $filter->city_id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('city'))
                        <div class="invalid-feedback">
                            {{ $errors->first('city') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.email.fields.city_helper') }}</span>
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

@section('scripts')
    <script>
        $(document).ready(function () {
            function SimpleUploadAdapter(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
                    return {
                        upload: function() {
                            return loader.file
                                .then(function (file) {
                                    return new Promise(function(resolve, reject) {
                                        // Init request
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('POST', '{{ route('admin.email-lists.storeCKEditorImages') }}', true);
                                        xhr.setRequestHeader('x-csrf-token', window._token);
                                        xhr.setRequestHeader('Accept', 'application/json');
                                        xhr.responseType = 'json';

                                        // Init listeners
                                        var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                                        xhr.addEventListener('error', function() { reject(genericErrorText) });
                                        xhr.addEventListener('abort', function() { reject() });
                                        xhr.addEventListener('load', function() {
                                            var response = xhr.response;

                                            if (!response || xhr.status !== 201) {
                                                return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                                            }

                                            $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                                            resolve({ default: response.url });
                                        });

                                        if (xhr.upload) {
                                            xhr.upload.addEventListener('progress', function(e) {
                                                if (e.lengthComputable) {
                                                    loader.uploadTotal = e.total;
                                                    loader.uploaded = e.loaded;
                                                }
                                            });
                                        }

                                        // Send request
                                        var data = new FormData();
                                        data.append('upload', file);
                                        data.append('crud_id', '{{ $emailList->id ?? 0 }}');
                                        xhr.send(data);
                                    });
                                })
                        }
                    };
                }
            }

            var allEditors = document.querySelectorAll('.ckeditor');
            for (var i = 0; i < allEditors.length; ++i) {
                ClassicEditor.create(
                    allEditors[i], {
                        extraPlugins: [SimpleUploadAdapter]
                    }
                );
            }
        });
    </script>

@endsection
