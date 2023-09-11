<?php

namespace App\Http\Requests;

use App\Models\Email;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEmailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('email_create');
    }

    public function rules()
    {
        return [
            'record_type' => [
                'required',
            ],
            'email_contact' => [
                'required',
                'unique:emails',
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
