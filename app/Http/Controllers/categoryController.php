<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Arr;

class categoryController extends Controller
{
    function index() {
        $categories = Category::all();
        // dd($categories);
        return view('backend.category.list', ['categories' => $categories]);
    }
    function create(){
        return view('backend.category.add');
    }
    function store(){
        $data = request()->all();
        $data = Arr::except($data, ['_token']);
        // dd($data);
        $category = Category::create($data);
        // dd($category);
        return redirect()->route('category.index')->with('success','Thêm chủ đề thành công');
    }
    function destroy($id){
        $category = Category::find($id);
        $category->destroy();
        return redirect()->route('listCategory')->with('success','Xóa chủ đề thành công');

    }
    function edit($id){
        $data['category'] = Category::find($id);
        // dd($user->name);
        return view('backend.category.edit',$data);
    }
    function update($id){
        $request = request()->all();
        $data = Arr::except($request, ["_token"]);
        $category = Category::find($id);
        // dd($request['status']);
        $category->name = $request['name'];
        $category->status = $request['status'];
        // dd($category);
        $category->update();
        return redirect()->route('category.edit', $id)->with('success','Cập nhật chủ đề thành công');
    }
}
