<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Addon;
use App\Models\Menu;
use App\Models\MenuAddon;
use Illuminate\Http\Request;

class MenuAddonController extends Controller
{
    public function index(){
        $menu_addons = MenuAddon::all();
        $menus = Menu::all();
        $addons = Addon::all();

        return view("admin.menu_addon.index",["menu_addons"=>$menu_addons,
         "menus" => $menus,
         "addons" => $addons
        ]
        );

    }

    public function create(Request $request){
        $validator = validator($request->all(),[
           'menu_id' => 'required',
           'addon_id' => 'required'
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $menu_addon=new MenuAddon();
        $menu_addon->menu_id=$request->menu_id;
        $menu_addon->add_id=$request->addon_id;
        $menu_addon->save();
        return back()->with('info','Created Successfully');
    }

    public function delete($id){
        $menu_addon = MenuAddon::find($id);
        $menu_addon->delete();
        return back()->with('info','Deleted Successfully');
    }

    public function edit($id){
        $menu_addon = MenuAddon::find($id);
        $menus = Menu::all();
        $addons = Addon::all();
        return view('admin.menu_addon.edit',[
            "menu_addon" => $menu_addon,
            "menus" => $menus,
            "addons" => $addons
        ]);
    }

    public function update($id, Request $request){
       $validator = validator($request->all(),[
           'menu_id' => 'required',
           'addon_id' => 'required'
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $menu_addon=MenuAddon::find($id);
        $menu_addon->menu_id=$request->menu_id;
        $menu_addon->add_id=$request->addon_id;
        $menu_addon->save();
        return back()->with('info','Edited Successfully');
    }
}
