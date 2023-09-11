<?php

namespace App\Http\Requests;

use App\Models\Email;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEmailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('email_edit');
    }

    public function rules()
    {
        return [
            'record_type' => [
                'required',
            ],
            'email_contact' => [
                'required',
                'unique:emails,email_contact,' . request()->route('email')->id,
            ],
            'phone' => [
                'string',
                'nullable',
            ],
            'contact_name' => [
                'string',
                'nullable',
            ],
            'industries' => [
                'string',
                'nullable',
            ],
            'county' => [
                'string',
                'nullable',
            ],
            'zip_code' => [
                'string',
                'nullable',
            ],
            'area_code' => [
                'string',
                'nullable',
            ],
            'website' => [
                'string',
                'nullable',
            ],
        ];
    }
}
