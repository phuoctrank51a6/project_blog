<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;

class homeController extends Controller
{
    function index(){
        $posts = Post::all();
        return view("client.home.index", $posts);
    }
}
