<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();

        return view("admin.category.index",["categories"=>$categories]);

    }

    public function create(Request $request){
        $validator = validator($request->all(),[
           'cat_name' => 'required'
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $category=new Category();
        $category->title=$request->cat_name;
        $category->save();
        return back()->with('info','Created Successfully');
    }

    public function delete($id){
        $category = Category::find($id);
        $category->delete();
        return back()->with('info','Deleted Successfully');
    }

    public function edit($id){
        $category = Category::find($id);
        return view('admin.category.edit',[
            "category" => $category
        ]);
    }

    public function update($id, Request $request){
        $validator = validator($request->all(),[
           'cat_name' => 'required'
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $category=Category::find($id);
        $category->title=$request->cat_name;
        $category->save();
        return back()->with('info','Updated Successfully');
    }
}
