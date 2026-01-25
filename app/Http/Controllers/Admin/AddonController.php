<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Addon;
use App\Models\AddonCategory;
use Illuminate\Http\Request;

class AddonController extends Controller
{
   public function index(){
    $addon_categories = AddonCategory::all();
    $addons = Addon::all();

    return view('admin.addon.index',[
        'addon_categories' => $addon_categories,
        'addons' => $addons
    ]);
   }


    public function create(Request $request){
        $validator = validator($request->all(),[
           'name' => 'required',
           'addcat_id' =>'required',
           'price' => 'required'
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $addon=new Addon();
        $addon->name=$request->name;
        $addon->addcat_id=$request->addcat_id;
        $addon->price=$request->price;
        $addon->save();
        return back()->with('info','Created Successfully');
    }

    public function delete($id)
    {
        $addon = Addon::find($id);
        $addon->delete();
    }

    public function edit($id)
    {
        $addon = Addon::find($id);
        $addon_categories = AddonCategory::all();
        return view('admin.addon.edit',[
            'addon' => $addon,
            'addon_categories' => $addon_categories
        ]);
    }

    public function update($id,Request $request){
        $validator = validator($request->all(),[
           'name' => 'required',
           'addcat_id' =>'required',
           'price' => 'required'
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $addon=Addon::find($id);
        $addon->name=$request->name;
        $addon->addcat_id=$request->addcat_id;
        $addon->price=$request->price;
        $addon->save();
        return back()->with('info','Updated Successfully');
    }
}

