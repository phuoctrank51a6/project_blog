<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Arr;
use Auth;

class AuthController extends Controller
{
    
    function login(){
        return view('backend.login');
    }
    function postLogin(LoginRequest $request){
        $data = Arr::except($request->all(), ['_token']);
        $user = User::where('email', $data['email'])->first();
        // dd($user['role']);
        $result = Auth::attempt($data);
        // dd($result);
        if ($result == true) {
            session()->put('email', $data['email']);
            if ($user['role'] == config('common.role.admin')) {
                return redirect()->route('admin'); 
            }
            else {
                return redirect()->route('blog');
            }
        }else{
            return redirect()->back()->withInput()->with('thongbao','Tài khoản hoặc mật khẩu không chính xác'); 
        }   
    }
    function logout(){
        Auth::logout();
        return redirect()->route('admin');
    }
}
