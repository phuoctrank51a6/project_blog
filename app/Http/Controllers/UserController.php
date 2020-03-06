<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Arr;

class UserController extends Controller
{
    function index() {
        $users = User::all();
        // dd($users);
        return view('backend.user.list', ['users' => $users]);
    }
    function create(){
        return view('backend.user.add');
    }
    function store(){
        $data = request()->all();
        $data = Arr::except($data, ['_token']);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'avatar' => $data['avatar'],
            'password' => bcrypt($data['password']),
            'role' => $data['role'],
            'status' => $data['status']
            // if($request->hasFile('avatar')){
            //     $file = $request->file('avatar');
            //     $filename = $file->hashName();
            //     'avatar' = $file->store('uploads');
            // }
        ]);
        return redirect()->route('user.index')->with('success', 'Thêm tài khoản thành công');
    }
    function destrow($id){
        User::destroy($id);
        return redirect()->route('user.index');

    }
    function edit($id){
        $data['user'] = User::find($id);
        // dd($user->name);
        return view('backend.user.edit',$data);
    }
    function update($id){
        $data = Arr::except(request()->all(), ["_token"]);
        // dd($data);
        $user = User::find($id);
        // dd($request['status']);
        $user->name = $data['name'];
        $user->email = $data['email'];
        if($data['avatar'] != null){
            $user->avatar = $data['avatar'];
        }
        if($data['password'] != null){
            $user->password = bcrypt($data['password']);
        }
        $user->role = $data['role'];
        $user->status = $data['status'];
        // dd($user);
        $user->update();
        return redirect()->route('user.edit',  $id)->with('success', 'Sửa tài khoản thành công');
    }
}
