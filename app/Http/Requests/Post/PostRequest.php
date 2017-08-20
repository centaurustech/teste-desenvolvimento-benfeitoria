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
                'title'         => 'required',
                'description'   => 'required',
                'cover'         => 'mimes:jpeg,bmp,png,jpg',
                'tags'          => 'required',
                'authors'       => 'required',
                ];
    }

    public function messages()
    {
        return [
            'title.required'        => 'Titulo da postagem é obrigatório',
            'description.required'  => 'Descricao da postagem é obrigatório',
            'tags.required'         => 'Campo tags da postagem é obrigatório',
            'authors.required'      => 'Campo autor da postagem é obrigatório',
            'cover.mimes'           => 'Formato da imagem invalido',

        ];
    }
}
