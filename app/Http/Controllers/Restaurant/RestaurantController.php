<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\MenuItem;
use App\Restaurant;

class RestaurantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:restaurant', ['except' => 'getMenuItemInfo']);
    }

    public function getHome()
    {
        return view('restaurant.restaurant-home');
    }

    public function getMenuItemInfo(Restaurant $restaurant, MenuItem $menuItem)
    {
        return view('menu.restaurant-menu-item', ['menuItem' => $menuItem, 'restaurant' => $restaurant]);
    }
}
