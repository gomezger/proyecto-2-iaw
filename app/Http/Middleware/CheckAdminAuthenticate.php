<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdminAuthenticate
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

        // si esta logueado y es admin
        if(Auth::check() && Auth::user()->rol == 'admin')
            return $next($request);
        else{
            // si es otro tipo de usuario, lo deslogueo y lo mando al login
            Auth::logout();
            return redirect('login')->with('admin-status','Solo los administradores pueden acceder al panel de control');  
        }
         
    }
}
