<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePost extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'     => 'bail|required',
            'title'    => 'bail|required'
        ];
    }
    
    public function messages()
    {
        return [
            'name.required' => "O nome é obrigatório.",
            'title.required' => "O título é obrigatório.",
        ];
    }
}
