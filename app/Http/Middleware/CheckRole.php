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
           
            Auth::logout();

            return redirect()->route('login')->with('thongbao', 'Tài khoản của bạn chưa được kích hoạt!')->withInput();
        }
        return $next($request);
    }
}
