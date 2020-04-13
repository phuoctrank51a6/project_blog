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

            return redirect()->route('blog')->with('thongbao', 'Tài khoản của bạn chỉ là tài khoản thường! Nhấn OK để trở về Trang chủ')->withInput();
        }
        return $next($request);
    }
}
