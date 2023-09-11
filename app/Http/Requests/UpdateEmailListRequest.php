<?php

namespace App\Http\Requests;

use App\Models\Lists;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEmailListRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('email_list_edit');
    }

    public function rules()
    {
        return [
            'list_title' => [
                'string',
                'required',
            ],
            'list_price' => [
                'required',
            ],
        ];
    }
}
