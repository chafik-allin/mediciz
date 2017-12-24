<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class checkRole
{

    public function handle($request, Closure $next, $role)
    {
        //Vérifier s'il est connecter
        if(!Auth::check() )
            return redirect()->route('login')->withErrors("Vous devez être connecter pour pouvoir acceder à cette page");

        //Super Admin peut tout faire
        if($request->user()->isSuperAdmin())
            return $next($request);
        
        if(! ($request->user()->is($role)))
            dd("Vous n'avez pas le droit d'acceder ici");
            //return redirect()->route('login')->withErrors("Vous n'avez pas le droit d'acceder");
        return $next($request);
    }
}
