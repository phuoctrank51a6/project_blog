<?php

namespace App\Http\Controllers;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\EditUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Arr;

class UserController extends Controller
{
    function index() {
        $users = User::paginate(5);
        // dd($users);
        return view('backend.user.list', ['users' => $users]);
    }
    function create(){
        return view('backend.user.add');
    }
    function store(RegisterRequest $request){
        $data = Arr::except($request->all(), [
            '_token',
            'avatar'
            ]);
        if($request['avatar'] != null){
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }else{
            $data['avatar'] = 'avatars/no-image.png';
        }
        // dd($data);  

        $data['password']=bcrypt($data['password']);
        // dd($data);  
        User::create($data);
        return redirect()->back()->with('success', 'Đăng ký tài khoản thành công')->withInput();
    }
    function destroy($id){
        User::destroy($id);
        return redirect()->route('user.index');

    }
    function edit($id){
        // dd($id);
        $data['user'] = User::find($id);
        // dd($user->name);
        return view('backend.user.edit',$data);
    }
    function update(EditUserRequest $request, $id){
        $data = Arr::except(request()->all(), ["_token","avatar"]);
        // dd($request);
        $user = User::find($id);
        // dd($request['status']);
        $user->name = $data['name'];
        $user->email = $data['email'];
        if($request['avatar'] != null){
            $user['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }
        // dd($user['avatar']);
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
