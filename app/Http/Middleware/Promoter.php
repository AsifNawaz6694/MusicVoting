<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Promoter
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
 
        if(Auth::check() && Auth::user()->role_id != 3)
        {//dd(Auth::user());
            return redirect()->route('home');
        }
        return $next($request);
    }
}
