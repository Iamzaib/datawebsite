@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.email.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.emails.update", [$email->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required">{{ trans('cruds.email.fields.record_type') }}</label>
                    <select class="form-control {{ $errors->has('record_type') ? 'is-invalid' : '' }}" name="record_type" id="record_type" required>
                        <option value disabled {{ old('record_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach(App\Models\Email::RECORD_TYPE_SELECT as $key => $label)
                            <option value="{{ $key }}" {{ old('record_type', $email->record_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
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
                    <label class="required" for="email_contact">{{ trans('cruds.email.fields.email_contact') }}</label>
                    <input class="form-control {{ $errors->has('email_contact') ? 'is-invalid' : '' }}" type="email" name="email_contact" id="email_contact" value="{{ old('email_contact', $email->email_contact) }}" required>
                    @if($errors->has('email_contact'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email_contact') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.email.fields.email_contact_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="phone">{{ trans('cruds.email.fields.phone') }}</label>
                    <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $email->phone) }}">
                    @if($errors->has('phone'))
                        <div class="invalid-feedback">
                            {{ $errors->first('phone') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.email.fields.phone_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="contact_name">{{ trans('cruds.email.fields.contact_name') }}</label>
                    <input class="form-control {{ $errors->has('contact_name') ? 'is-invalid' : '' }}" type="text" name="contact_name" id="contact_name" value="{{ old('contact_name', $email->contact_name) }}">
                    @if($errors->has('contact_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('contact_name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.email.fields.contact_name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="company_name_id">{{ trans('cruds.email.fields.company_name') }}</label>
                    <select class="form-control select2 {{ $errors->has('company_name') ? 'is-invalid' : '' }}" name="company_name_id" id="company_name_id">
                        @foreach($company_names as $id => $entry)
                            <option value="{{ $id }}" {{ (old('company_name_id') ? old('company_name_id') : $email->company_name->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                            <option value="{{ $id }}" {{ (old('job_level_id') ? old('job_level_id') : $email->job_level->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                    <label for="industries">{{ trans('cruds.email.fields.industries') }}</label>
                    <input class="form-control {{ $errors->has('industries') ? 'is-invalid' : '' }}" type="text" name="industries" id="industries" value="{{ old('industries', $email->industries) }}">
                    @if($errors->has('industries'))
                        <div class="invalid-feedback">
                            {{ $errors->first('industries') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.email.fields.industries_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="country_id">{{ trans('cruds.email.fields.country') }}</label>
                    <select class="form-control select2 {{ $errors->has('country') ? 'is-invalid' : '' }}" name="country_id" id="country_id">
                        @foreach($countries as $id => $entry)
                            <option value="{{ $id }}" {{ (old('country_id') ? old('country_id') : $email->country->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                            <option value="{{ $id }}" {{ (old('state_id') ? old('state_id') : $email->state->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                            <option value="{{ $id }}" {{ (old('city_id') ? old('city_id') : $email->city->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                    <label for="county">{{ trans('cruds.email.fields.county') }}</label>
                    <input class="form-control {{ $errors->has('county') ? 'is-invalid' : '' }}" type="text" name="county" id="county" value="{{ old('county', $email->county) }}">
                    @if($errors->has('county'))
                        <div class="invalid-feedback">
                            {{ $errors->first('county') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.email.fields.county_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="zip_code">{{ trans('cruds.email.fields.zip_code') }}</label>
                    <input class="form-control {{ $errors->has('zip_code') ? 'is-invalid' : '' }}" type="text" name="zip_code" id="zip_code" value="{{ old('zip_code', $email->zip_code) }}">
                    @if($errors->has('zip_code'))
                        <div class="invalid-feedback">
                            {{ $errors->first('zip_code') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.email.fields.zip_code_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="area_code">{{ trans('cruds.email.fields.area_code') }}</label>
                    <input class="form-control {{ $errors->has('area_code') ? 'is-invalid' : '' }}" type="text" name="area_code" id="area_code" value="{{ old('area_code', $email->area_code) }}">
                    @if($errors->has('area_code'))
                        <div class="invalid-feedback">
                            {{ $errors->first('area_code') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.email.fields.area_code_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="website">{{ trans('cruds.email.fields.website') }}</label>
                    <input class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}" type="text" name="website" id="website" value="{{ old('website', $email->website) }}">
                    @if($errors->has('website'))
                        <div class="invalid-feedback">
                            {{ $errors->first('website') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.email.fields.website_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="price">{{ trans('cruds.email.fields.price') }}</label>
                    <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{ old('price', $email->price) }}" step="0.01">
                    @if($errors->has('price'))
                        <div class="invalid-feedback">
                            {{ $errors->first('price') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.email.fields.price_helper') }}</span>
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
    <script type="text/javascript">
        $("#country_id").change(function(){
            var URL="{{ route('admin.states.get_by_country',['xyz']) }}".replace('xyz',$(this).val());
            $.ajax({
                url: URL,
                method: 'GET',
                success: function(data) {
                    $('#state_id').html(data.html);
                    $('#city_id').html('');
                    $('.select2').select2();
                }
            });
        });
        $("#state_id").change(function(){
            var URL="{{ route('admin.cities.get_by_state',['xyz']) }}".replace('xyz',$(this).val());
            $.ajax({
                url: URL,
                method: 'GET',
                success: function(data) {
                    $('#city_id').html(data.html);
                    $('.select2').select2();
                }
            });
        });
    </script>
@endsection
