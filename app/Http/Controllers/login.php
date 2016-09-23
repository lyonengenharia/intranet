<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use App\Http\Requests\FormLogin;

class login extends Controller
{
    public function index(Request $request)
    {
        return view('auth.login');

    }
    public function logout(Request $request){
        $request->session()->forget('email');
        $request->session()->flush();
        return redirect('login')->with('status', 'Obrigado por utilizar o sistema.');
    }

    public function acesso(FormLogin $request)
    {

        $validator = Validator::make($request->all(),$request->rules(),$request->messages());
        $email = $this->checkdominio($request->input('username'), $request->input('password'));
        if (empty($email)) {
            $validator->after(function ($validator) {
                $validator->errors()->add('username', 'Usuário e senha incorretos');
            });
            return 'Usuário e senha incorretos';
            //return redirect('login')->withErrors($validator)->withInput();
        }

        $user =  \App\Users::where('email',$email)->with("permission")->get();
        //dd($user->count());
        if($user->count()<1){
            $validator->after(function ($validator) {
                $validator->errors()->add('status_danger', 'Usuário não encontrado, favor entrar em contato com a TI.');
            });
            //return redirect('login')->withErrors($validator)->withInput();
            return 'usuário não cadastro';

        }

        $request->session()->put("email",$email);
        return redirect('home');


    }

    /**
     * Test various users in server ldap
     * @param String $user
     * @param String $pass
     * @return null|string
     */
    private function checkdominio($user, $pass)
    {
        $dominios = array("lyonengenharia", "lyonfacilities", "admgeral");
        foreach ($dominios as $row) {
            if ($this->checkldap($user, $pass, $row)) {
                return $user . "@" . $row . ".com.br";
            }
        }
        return NULL;
    }

    /**
     * Check user in server ldap
     * @param String $user
     * @param String $pass
     * @param String $domain
     * @return bool
     *
     */
    private function checkldap($user, $pass, $domain)
    {
        $ldap['user'] = $user;
        $ldap['pass'] = $pass;
        $ldap['host'] = env('MAIL_LDAP');
        $ldap['port'] = 389;
        $ldap['dn'] = 'uid=' . $ldap['user'] . ',ou=people,dc=' . $domain . ',dc=com,dc=br';
        $ldap['base'] = '';
        $ldap['conn'] = ldap_connect($ldap['host'], $ldap['port']);
        ldap_set_option($ldap['conn'], LDAP_OPT_PROTOCOL_VERSION, 3);
        if (@ldap_bind($ldap['conn'], $ldap['dn'], $ldap['pass'])) {
            return true;
        }
        return false;
    }

}
