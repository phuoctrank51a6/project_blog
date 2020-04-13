<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Http\Requests\PostRequest;

class postController extends Controller
{
    function index() {
        $posts = Post::paginate(10);
        // dd($posts);
        return view('backend.post.list', ['posts' => $posts]);
    }
    function create(){
        $categories = Category::all();
        return view('backend.post.add', ['categories' => $categories]);
    }
    function store(PostRequest $request){
        // dd($request);
        // dd($request['image']);  
        $data = Arr::except($request->all(), [
            '_token',
            'image',
            ]);
        if($request['image'] != null){
            $data['image'] = $request['image']->store('images', 'public');
        }else{
            $data['image'] = 'images/no-image.png';
        }
        // dd($data['image']);
        Post::create($data);
        return redirect()->back()->with('success','Thêm bài viết thành công')->withInput();
    }
    function destroy($id){
        $post = Post::find($id);
        // dd($post);
        $post->delete();
        return redirect()->back();
    }
    function edit($id){
        $categories = Category::all();
        $data['post'] = Post::find($id);
        // dd($data);
        if ($data['post'] == null) {
            return redirect()->route('post.index')->with('error','Không có bài viết này. Nhấn OK để trở về trang danh sách.');
        }
        return view('backend.post.edit',$data, ['categories' => $categories]);
    }
    function update(PostRequest $request, $id){
        $data = Arr::except($request->all(), ["_token","image"]);
        $post = Post::find($id);
        // dd($request['image']);
        
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->status = $data['status'];
        $post->category_id = $data['category_id'];
        if($request['image'] != null){
            $post['image'] = $request['image']->store('images', 'public');
        }
        // dd($post);
        $post->update();
        return redirect()->route('post.edit', $id)->with('success','Cập nhật bài viết thành công');
    }
}
