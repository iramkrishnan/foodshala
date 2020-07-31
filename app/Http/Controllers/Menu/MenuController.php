<?php

namespace App\Http\Controllers\Menu;

use App\MenuItem;
use App\Http\Controllers\Controller;
use App\RestaurantMenuItem;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:restaurant', ['except' => ['getList']]);
    }

    public function getList()
    {
        $menuItems = MenuItem::all();

        return view('menu.menu', [
            'menuItems' => $menuItems,
        ]);
    }

    public function getAdd()
    {
        return view('menu.menu-add');
    }

    public function postAdd(Request $request)
    {
        request()->validate([
            'menu_item' => 'required|string'
        ]);

        $menuItem = MenuItem::firstOrCreate(
            ['menu_item' => $request['menu_item']],
        );

        RestaurantMenuItem::firstOrCreate([
            'restaurant_id' => $request->user()->id,
            'menu_item_id' => $menuItem->id,
        ]);

        return redirect()->route('get.menu');
    }
}
