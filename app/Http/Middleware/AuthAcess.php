<?php

namespace App\Http\Middleware;

use Closure;

class AuthAcess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(empty($request->session()->has("email"))){
            return redirect('login')->with('status', 'Sua sessão expirou, faça login novamente.');
        }else{

        }
        return $next($request);
    }
}
