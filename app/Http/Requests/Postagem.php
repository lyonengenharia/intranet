<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class Postagem extends Request
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titulo'=> 'required|max:100',
            'corpo'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'O Título é requerido.',
            'titulo.max'  => 'O tamanho máximo é de 100 caracteres',
            'corpo.required'=>'´Esse campos é requerido'
        ];
    }
}
