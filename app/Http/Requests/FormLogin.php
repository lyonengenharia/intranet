<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FormLogin extends Request
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
            'username'=> 'required|max:255',
            'password'=>'required|min:6'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Usuário é exigido',
            'password.required'  => 'A senha não pode estar em branco',
            'password.min'=>'A senha não deve ter menor de seis caracteres'
        ];
    }
}
