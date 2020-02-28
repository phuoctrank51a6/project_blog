<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    function listCategory() {
        $categories = Category::all();
        // dd($categories);
        return view('backend.category.list', ['categories' => $categories]);
    }
    function addCategory(){
        return view('backend.category.add');
    }
    function saveAddCategory(){
        $data = request()->all();
        // dd($data['status']);
        // $data = Arr::except($request, ['_token']);
        $category = Category::create($data);
        // dd($category);
        return redirect()->route('listCategory');
    }
    function deleteCategory($id){
        Category::destroy($id);
        return redirect()->route('listCategory');

    }
    function editCategory($id){
        $data['category'] = Category::find($id);
        // dd($user->name);
        return view('backend.category.edit',$data);
    }
    function saveEditCategory($id){
        $request = request()->all();
        // $data = Arr::except($request, ["_token"]);
        $category = Category::find($id);
        // dd($request['status']);
        $category->name = $request['name'];
        $category->status = $request['status'];
        // dd($category);
        $category->save();
        return redirect()->route('listCategory');
    }
}
