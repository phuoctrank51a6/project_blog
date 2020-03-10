<?php

namespace App\Http\Controllers;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class AdminController extends Controller
{
    function index() {
        $totalUser = User::count();
        $totalCategory = Category::count();
        $totalPost = Post::count();
        $totalComment = Comment::count();
        $array = array();
        for($i=1; $i<13;$i++){
            $count = Post::whereMonth('created_at', $i)->whereYear('created_at', '2020')->count();
            // echo $count;
            array_push($array, $count);
        }
        // dd($array);
        // $countCate = Post::select('category_id', Post::count())->groupBy('category_id')->get();
        // dd($countCate);

        return view('backend.index',compact('totalUser','totalCategory','totalPost','totalComment', 'array'));
    }
    function register(){
        return  view('backend.register');
    }
    function saveRegister(RegisterRequest $request){
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
};
