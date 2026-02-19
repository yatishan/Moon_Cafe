<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('user.main.home',[
            "menus" => $menus
        ]);
    }

    public function menu()
    {
        $menus = Menu::all();
        return view('user.main.menu',[
            "menus" => $menus
        ]);
    }
}
