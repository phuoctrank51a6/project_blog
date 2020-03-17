<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;
use Arr;
use Auth;
use Carbon\Carbon;

class homeController extends Controller
{
    function index(){
        $posts = Post::where('status', config('common.status.daDuyet'))->get();
        $categories = Category::all();
        $yearNow = Carbon::now()->year;
        $monthNow = Carbon::now()->month;
        $limitPosts = Post::whereMonth('created_at', $monthNow)
                            ->whereYear('created_at', $yearNow)
                            ->orderBy('like','desc')
                            ->take(3)
                            ->get();
        // dd($posts);
        return view("client.home.index",
        //  ['posts' => $posts], 
        //  ['categories' => $categories], 
        //  ['limitPosts' => $limitPosts],
         compact('posts', 'categories', 'limitPosts') 
        );
    }
    function show($id){
        // dd($id);
        $categories = Category::all();
        $yearNow = Carbon::now()->year;
        $monthNow = Carbon::now()->month;
        $limitPosts = Post::whereMonth('created_at', $monthNow)
                            ->whereYear('created_at', $yearNow)
                            ->orderBy('like','desc')
                            ->take(3)
                            ->get();
        $post = Post::where('id',$id)->first();
        $comments = Comment::where('post_id',$id)->where('status',config('common.status.daDuyet'))->get();
        // dd($comments);
        return view("client.home.show", compact('post', 'categories', 'limitPosts','comments') );
    }
    function comment(CommentRequest $request){
        // dd( Auth::user());
        if(Auth::user()){
            // dd($request);
            $data = Arr::except($request->all(), ['_token']);
            // dd($data);
            $category = Comment::create($data);
            return redirect()->back()->with('success','Bình luận thành công chờ Admin kiểm duyệt');
        }else{
            return redirect()->back()->with('success','Đăng nhập để có thể bình luận')->withInput();
        }
    }
    function myBlog($id){
        $categories = Category::all();
        $posts = Post::where('user_id',$id)->get();
        $yearNow = Carbon::now()->year;
        $monthNow = Carbon::now()->month;
        $limitPosts = Post::whereMonth('created_at', $monthNow)
                            ->whereYear('created_at', $yearNow)
                            ->orderBy('like','desc')
                            ->take(3)
                            ->get();
        return view("client.home.index", compact('posts', 'categories', 'limitPosts'));
    }
}
