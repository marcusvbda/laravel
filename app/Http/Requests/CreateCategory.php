<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategory extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'     => 'bail|required'
        ];
    }
    
    public function messages()
    {
        return [
            'name.required' => "O nome é obrigatório."
        ];
    }
}
