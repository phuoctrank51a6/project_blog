<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class CheckStatus
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
        if(Auth::check() && Auth::user()->status === 0){ 

            Auth::logout();

            return redirect()->route('login')->with('thongbao', 'Tài khoản của bạn chưa được kích hoạt!')->withInput();

        }

        return $next($request);
    }
}
