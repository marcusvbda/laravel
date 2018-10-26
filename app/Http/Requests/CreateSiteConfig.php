<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSiteConfig extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'    => 'bail|required',
        ];
    }
    
    public function messages()
    {
        return [
            'title.required' => "O título é obrigatório.",
        ];
    }
}
