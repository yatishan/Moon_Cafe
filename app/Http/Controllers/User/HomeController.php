<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderMenu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('user.main.home', [
            "menus" => $menus
        ]);
    }

    public function menu()
    {
        $menus = Menu::all();
        $categories = Category::all();
        return view('user.main.menu', [
            "menus" => $menus,
            "categories" => $categories
        ]);
    }

    public function category($cat_id)
    {
        $menus = Menu::where('cat_id', $cat_id)->get();
        $categories = Category::all();
        return view('user.main.menu', [
            "menus" => $menus,
            "categories" => $categories
        ]);
    }

    public function cart()
    {
        return view('user.main.cart');
    }

    public function store(Request $request)
    {   // 1. Get the string from the request
        $jsonCart = $request->input('cart_data');

        // 2. Convert JSON string back to PHP Array
        $carts = json_decode($jsonCart, true);

        $total_price = 0;
        foreach($carts as $cart ){
           $price = $cart['qty']* $cart['price'];
           $total_price +=$price;
        }
        $order = new Order();
        $order->user_id = 1;
        $order->status = "pending";
        $order->total_price = $total_price;
        $order->save();
        $newOrderId = $order->id;
        foreach($carts as $cart ){
           $price = $cart['qty']* $cart['price'];
           $order_menu = new OrderMenu();
           $order_menu->order_id = $newOrderId;
           $order_menu->menu_id =$cart['id'];
           $order_menu->price = $cart['price'];
           $order_menu->qty = $cart['qty'];
           $order_menu->save();
        }

        return back()->with("info","successfully created");
    }
}
