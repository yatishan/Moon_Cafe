<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
        $categories = Category::all();
        return view('user.main.menu',[
            "menus" => $menus,
            "categories" => $categories
        ]);
    }

    public function category($cat_id)
    {
        $menus = Menu::where('cat_id', $cat_id)->get();
        $categories = Category::all();
        return view('user.main.menu',[
            "menus" => $menus,
            "categories" => $categories
        ]);
    }

    public function cart(){
        return view('user.main.cart');
    }
}
