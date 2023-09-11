<?php

namespace App\Http\Requests;

use App\Models\Lists;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEmailListCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('email_list_create');
    }

    public function rules()
    {
        return [
            'listCategory_title' => [
                'string',
                'required',
            ],
        ];
    }
}
