<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
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
}
