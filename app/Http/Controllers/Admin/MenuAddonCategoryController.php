<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Addon;
use App\Models\AddonCategory;
use App\Models\Menu;
use App\Models\MenuAddonCategory;
use Illuminate\Http\Request;

class MenuAddonCategoryController extends Controller
{
    public function index(){
        $menu_addon_categories = MenuAddonCategory::all();
        $menus = Menu::all();
        $addon_categories = AddonCategory::all();

        return view("admin.menu_addon_category.index",["menu_addon_categories"=>$menu_addon_categories,
         "menus" => $menus,
         "addon_categories" => $addon_categories
        ]
        );

    }

    public function create(Request $request){
        $validator = validator($request->all(),[
           'menu_id' => 'required',
           'addoncat_id' => 'required'
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $menu_addon_category=new MenuAddonCategory();
        $menu_addon_category->menu_id=$request->menu_id;
        $menu_addon_category->addcat_id=$request->addoncat_id;
        $menu_addon_category->save();
        return back()->with('info','Created Successfully');
    }

    public function delete($id){
        $menu_addon_category = MenuAddonCategory::find($id);
        $menu_addon_category->delete();
        return back()->with('info','Deleted Successfully');
    }

    public function edit($id){
        $menu_addon_category = MenuAddonCategory::find($id);
        $menus = Menu::all();
        $addon_categories = AddonCategory::all();
        return view('admin.menu_addon_category.edit',[
            "menu_addon_category" => $menu_addon_category,
            "menus" => $menus,
            "addon_categories" => $addon_categories
        ]);
    }

    public function update($id, Request $request){
       $validator = validator($request->all(),[
           'menu_id' => 'required',
           'addoncat_id' => 'required'
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $menu_addon_category=MenuAddonCategory::find($id);
        $menu_addon_category->menu_id=$request->menu_id;
        $menu_addon_category->addcat_id=$request->addoncat_id;
        $menu_addon_category->save();
        return back()->with('info','Edited Successfully');
    }
}
