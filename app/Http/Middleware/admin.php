<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class admin
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


        if (Auth::check()) {                // wata agar user logged in bwa 
            if (Auth::user()->isAdmin()) {
                return $next($request);     // wata agar user logged in bwa awa requesty dwatr y user aka jebaje bka
            }
        }

        return redirect('/');               // wata agar aw marjanay saraway tya nabu
        
    }
}
