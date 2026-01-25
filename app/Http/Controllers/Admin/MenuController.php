<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $menus = Menu::latest()->paginate(1);

        return view('admin.menu.index',[
            'categories' => $categories,
            'menus' => $menus
        ]);
    }

    public function create(Request $request)
    {
        $validator = validator($request->all(),[
            'name' => 'required',
            'price' => 'required',
            'cat_id' => 'required',
            'image' => 'required',
            'detail' => 'required'
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $menu = new Menu();
        $menu->title = $request->name;
        $menu->price = $request->price;
        $menu->cat_id = $request->cat_id;
        $menu->detail = $request->detail;
        $file = $request->file('image');
        if($file){
            $filename= time().'.'.$file->getClientOriginalExtension();
            $file->storeAs('images',$filename,'public');
            $menu->image = $filename;
        }

        $menu->save();

        return back()->with('info','created successfully');
    }

    public function delete($id)
    {
        $menu = Menu::find($id);
        $menu->delete();
        return back()->with("info","deleted successfully");
    }

    public function edit($id)
    {
        $menu = Menu::find($id);
        $categories = Category::all();
        return view('admin.menu.edit',[
            'menu' => $menu,
            'categories' => $categories
        ]);
    }

    public function update($id ,Request $request)
    {
        $validator = validator($request->all(),[
            'name' => 'required',
            'price' => 'required',
            'cat_id' => 'required',
            'detail' => 'required'
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $menu = Menu::find($id);
        $menu->title = $request->name;
        $menu->price = $request->price;
        $menu->cat_id = $request->cat_id;
        $menu->detail = $request->detail;
        $file = $request->file('image');
        if($file){
            $filename= time().'.'.$file->getClientOriginalExtension();
            $file->storeAs('images',$filename,'public');
            $menu->image = $filename;
        }

        $menu->save();

        return back()->with('info','Updated successfully');
    }
}
