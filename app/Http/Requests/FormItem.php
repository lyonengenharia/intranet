<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FormItem extends Request
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
            'nome'=>'required',
            'url'=>'required',
            'target'=>'required',
            'assocmenus'=>'required'

        ];
    }
    public function messages()
    {
        return [
            "nome.required"=>"O nome para exibição do link é obrigatório.",
            "url.required"=>"O campo URL é obrigatório.",
            "target.required"=>"Esse campo é obrigatório seu preenchimento.",
            "assocmenus.required"=>'Escolha ao menos um menu.'
        ];
    }
}
