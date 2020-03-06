<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Arr;

class commentController extends Controller
{
    
    function index() {
        $comments = Comment::all();
        // dd($comments);
        return view('backend.comment.list', ['comments' => $comments]);
    }
    function destroy($id){
        // dd($id); 
        $comment = Comment::find($id);
        // Comment::destroy($id);
        $comment->delete();
        return redirect()->route('comment.index')->with('success','Xóa bình luận thành công');

    }
    
    // public function show($id)
    // {
    //     $posts = Post::all();
    //     $comment['comment'] = comment::find($id);
    //     return view('backend.comment.edit',$comment, ['posts' => $posts]);
    // }
    function edit($id){
        // dd($id); 
        $posts = Post::all();
        $comment['comment'] = comment::find($id);
        // dd($user->name);
        return view('backend.comment.edit',$comment, ['posts' => $posts]);
    }
    function update($id){
        // dd($id);
        $request = request()->all();
        $comment = comment::find($id);
        // dd($comment['title']);
        $data = Arr::except($request, ["_token"]);
        // dd($data);
        $comment->update($data);
        return redirect()->route('comment.edit' , $id)->with('success','Cập nhật bình luận thành công');
    }
}
