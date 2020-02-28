<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function listUsers() {
        $users = User::all();
        // dd($users);
        return view('backend.user.list', ['users' => $users]);
    }
    function addUser(){
        return view('backend.user.add');
    }
    function saveAddUser(){
        $data = request()->all();
        // $data = Arr::except($request, ['_token']);
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
        return redirect()->route('listUser');
    }
    function deleteUser($id){
        User::destroy($id);
        return redirect()->route('listUser');

    }
    function editUser($id){
        $data['user'] = User::find($id);
        // dd($user->name);
        return view('backend.user.edit',$data);
    }
    function saveEditUser($id){
        $request = request()->all();
        // $data = Arr::except($request, ["_token"]);
        $user = User::find($id);
        // dd($request['status']);
        $user->name = $request['name'];
        $user->email = $request['email'];
        if($request['avatar'] != null){
            $user->avatar = $request['avatar'];
        }
        if($request['password'] != null){
            $user->password = bcrypt($request['password']);
        }
        $user->role = $request['role'];
        $user->status = $request['status'];
        // dd($user);
        $user->save();
        return redirect()->route('listUser');
    }
}
