<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class checkOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $company)
    {
        if(! Auth::check() )
            return redirect()
                    ->route('login')
                    ->withErrors("Vous devez être connecter pour pouvoir acceder à cette page");

        if(!$request->user()->owner($company))
            return "tu n'est pas le owner hbibi!";
        return $next($request);
    }
}
