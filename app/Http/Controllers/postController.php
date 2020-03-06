<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class postController extends Controller
{
    function index() {
        $posts = Post::all();
        // dd($posts);
        return view('backend.post.list', ['posts' => $posts]);
    }
    function create(){
        $categories = Category::all();
        return view('backend.post.add', ['categories' => $categories]);
    }
    function store(){
        $request = request()->all();
        // dd($request);
        // dd($request['image']);  
        $data = Arr::except($request, [
            '_token',
            'image',
            ]);
        $data['image'] = $request['image']->store('images', 'public');
        // dd($data['image']);
        Post::create($data);
        return redirect()->route('post.index')->with('success','Thêm bài viết thành công');
    }
    function destroy($id){
        
        $post = Post::find($id);
        // dd($post);
        $post->delete();
        return redirect()->route('post.index');

    }
    function edit($id){
        $categories = Category::all();
        $data['post'] = Post::find($id);
        // dd($data);
        return view('backend.post.edit',$data, ['categories' => $categories]);
    }
    function update($id){
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
        }else{
            $post->image = 'no-immage.png';
        }
        $post->status = $data['status'];
        $post->category_id = $data['category_id'];
        $post->user_id = $data['user_id'];
        // dd($post);
        $post->update();
        return redirect()->route('post.edit', $id)->with('success','Cập nhật bài viết thành công');
    }
}
