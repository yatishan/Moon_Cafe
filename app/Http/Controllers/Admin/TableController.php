<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function index()
    {
        $tables = Table::all();
        return view('admin.table.index',[
            'tables' => $tables
        ]);
    }

    public function create(Request $request)
    {
        $validator = validator($request->all(),[
            'name' => 'required',
            'seat' => 'required',
            'location' => 'required',
            'status' => 'required',
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $table = new Table();
        $table->name = $request->name;
        $table->seats = $request->seat;
        $table->location = $request->location;
        $table->status = $request->status;
        $table->save();

        return back()->with('info','created successfully');
    }

    public function delete($id)
    {
        $table = Table::find($id);
        $table->delete();
        return back()->with('info',"deleted successfully");
    }

    public function edit($id)
    {
        $table = Table::find($id);
        return view('admin.table.edit',[
            'table' => $table
        ]);
    }

    public function update($id ,Request $request)
    {
         $validator = validator($request->all(),[
            'name' => 'required',
            'seat' => 'required',
            'location' => 'required',
            'status' => 'required',
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $table = Table::find($id);
        $table->name = $request->name;
        $table->seats = $request->seat;
        $table->location = $request->location;
        $table->status = $request->status;
        $table->save();

        return back()->with('info','Edited successfully');
    }

}
