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
    function postLogin(LoginRequest $r){
        $request = request()->all();
        $data = Arr::except($request, ['_token']);
        $user = User::where('email', $data['email'])->first();
        // dd($user);
        $result = Auth::attempt($data);if ($result) {
            session()->put('email', $data['email']);
            return redirect()->route('admin'); 
        }else{
            return redirect()->back()->withInput()->with('thongbao','Tài khoản hoặc mật khẩu không chính xác'); 

        }

    //         } else {
    //         if($result){
    //             session()->put('email', $data['email']);
    //             return redirect()->route('admin');
    //         }else{
    //             return redirect()->back()->withInput()->with('thongbao','Tài khoản hoặc mật khẩu không chính xác');
    //         }
        
    }
    function logout(){
        Auth::logout();
        return redirect()->route('admin');
    }
}
