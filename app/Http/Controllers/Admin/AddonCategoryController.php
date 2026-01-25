<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AddonCategory;
use Illuminate\Http\Request;

class AddonCategoryController extends Controller
{
    public function index()
    {
        $addon_categories = AddonCategory::all();
        return view('admin.addonCategory.index',[
            'addon_categories' => $addon_categories
        ]);
    }

    public function create(Request $request){
        $validator = validator($request->all(),[
           'name' => 'required',
           'desc' => 'required'
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $addon_category=new AddonCategory();
        $addon_category->name=$request->name;
        $addon_category->detail=$request->desc;
        $addon_category->save();
        return back()->with('info','Created Successfully');
    }

    public function delete($id){
        $addon_category = AddonCategory::find($id);
        $addon_category->delete();
        return back()->with('info','Deleted Successfully');
    }

    public function edit($id){
        $addon_category = AddonCategory::find($id);
        return view('admin.addonCategory.edit',[
            "addon_category" => $addon_category
        ]);
    }

    public function update($id, Request $request){
        $validator = validator($request->all(),[
           'name' => 'required',
           'desc' => 'required'
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $addon_category=AddonCategory::find($id);
        $addon_category->name=$request->name;
        $addon_category->detail=$request->desc;
        $addon_category->save();
        return back()->with('info','Edited Successfully');
    }
}

