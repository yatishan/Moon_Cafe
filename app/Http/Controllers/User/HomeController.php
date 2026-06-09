<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Addon;
use App\Models\AddonCategory;
use App\Models\Category;
use App\Models\Menu;
use App\Models\MenuAddonCategory;
use App\Models\Order;
use App\Models\OrderMenu;
use Illuminate\Container\Attributes\Auth;
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

    public function menuDetail($id)
    {
        $menu = Menu::find($id);

        $relatedMenus = Menu::where('id', '!=', $menu->id)
            ->where('cat_id', $menu->cat_id)
            ->take(3)
            ->get();
        $menuAddonCategories = MenuAddonCategory::with('addon_category.addons')
            ->where("menu_id", $id)
            ->get();


        return view('user.main.menu_detail', [
            'menu' => $menu,
            'relatedMenus' => $relatedMenus,
            "menuAddonCategories" => $menuAddonCategories
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
        foreach ($carts as $cart) {
            $price = $cart['qty'] * $cart['price'];
            $total_price += $price;
        }
        $order = new Order();
        $order->user_id = auth()->id();
        $order->status = "pending";
        $order->total_price = $total_price;
        $order->save();
        $newOrderId = $order->id;
        foreach ($carts as $cart) {
            $addons_list = $cart['selected_addons'] ?? [];
            $addon_names = array_map(function ($item) {
                return $item['name'];
            }, $addons_list);
            $addon_name_string = implode(', ', $addon_names);
            $price = $cart['qty'] * $cart['price'];
            $order_menu = new OrderMenu();
            $order_menu->order_id = $newOrderId;
            $order_menu->menu_id = $cart['id'];
            $order_menu->price = $cart['price'];
            $order_menu->addons =$addon_name_string;
            $order_menu->qty = $cart['qty'];
            $order_menu->save();
        }

        return back()->with("info", "successfully created");
    }
}
