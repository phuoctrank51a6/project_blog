<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class CheckAuthentication
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
        // dd(111111);
        if (Auth::check() === false) {
            return redirect()->route('login');
        }
        return $next($request);
    }
}
