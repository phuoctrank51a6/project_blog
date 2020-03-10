<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class CheckRole
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
        // dd(config('common.role.admin'));
        if (Auth::user()->role !== config('common.role.admin')) {
            abort(403);
        }
        return $next($request);
    }
}
