<?php

namespace App\Http\Controllers;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class AdminController extends Controller
{
    function index() {
        return view('backend.index');
    }
    function register(){
        return  view('backend.register');
    }
    function saveRegister(RegisterRequest $r){
        // dd(registerRequest()->all());
        // $request = request()->all();
        // // dd($request);
        // $data = Arr::except($request, ['_token']);
        // // dd($data);
        // $data['password']=bcrypt($data['password']);
        // // dd($data);
        // User::create($data);
        // return redirect()->route('register');
        }
};
