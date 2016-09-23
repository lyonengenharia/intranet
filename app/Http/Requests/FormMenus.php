<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FormMenus extends Request
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
            'nome'=> 'required|max:100',
            'desc'=>'required|max:500',

        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome do menu é requerido',
            'nome.max' => 'O tamanho máximo para esse campo é 100 carácteres',
            'desc.required'  => 'A descrição  é requerida',
            'desc.max'  => 'O máximo de caracteres 500 é ',
            'localizacao.required'=>'Favor escolher pelo menos uma localização',
            'localizacao.size'=>'Campo vazio',

        ];
    }
}
