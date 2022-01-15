<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Osca
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
       if(auth()->check()){
           if (auth()->user()->user_type_id == 0) {
                return $next($request);
           }else{
               return redirect('/barangay');
           }
           return redirect()->route('login');
       }
       return redirect()->route('login');

    }
}
