<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class postController extends Controller
{
    function listPost() {
        $posts = Post::all();
        // dd($posts);
        return view('backend.post.list', ['posts' => $posts]);
    }
    function addPost(){
        $categories = Category::all();
        return view('backend.post.add', ['categories' => $categories]);
    }
    function saveAddPost(){
        $request = request()->all();
        $data = Arr::except($request, ['_token']);
        // dd($data);
        Post::create($data);
        return redirect()->route('listPost');
    }
    function deletePost($id){
        Post::destroy($id);
        return redirect()->route('listPost');

    }
    function editPost($id){
        $categories = Category::all();
        $data['post'] = Post::find($id);
        // dd($user->name);
        return view('backend.post.edit',$data, ['categories' => $categories]);
    }
    function saveEditPost($id){
        $request = request()->all();
        // dd($request['image']);
        $data = Arr::except($request, ["_token"]);
        $post = Post::find($id);
        // dd($post);
        // dd($data['title']);
        $post->title = $data['title'];
        $post->content = $data['content'];
        if($data['image'] != null){
            $post->image = $data['image'];
        }
        $post->status = $data['status'];
        $post->category_id = $data['category_id'];
        $post->user_id = $data['user_id'];
        // dd($post);
        $post->save();
        return redirect()->route('listPost');
    }
}
