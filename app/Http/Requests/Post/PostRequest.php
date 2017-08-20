<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
                'title' => 'required',
                'description' => 'required',
                ];
    }

    public function messages()
    {
        return [
            'title.required'        => 'Titulo da postagem é obrigatório',
            'description.required'  => 'Descricao da postagem é obrigatório',

        ];
    }
}
