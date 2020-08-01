<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\MenuItem;
use App\Restaurant;
use function GuzzleHttp\Promise\all;

class RestaurantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:restaurant', ['except' => ['getMenuItemInfo', 'getMenu', 'getList']]);
    }

    public function getHome()
    {
        return view('restaurant.restaurant-home');
    }

    public function getMenu(Restaurant $restaurant)
    {
        $menuItems = $restaurant->menuItems()->paginate(10);

        return view('restaurant.restaurant-menu', ['restaurant' => $restaurant, 'menuItems' => $menuItems,]);
    }

    public function getMenuItemInfo(Restaurant $restaurant, MenuItem $menuItem)
    {
        return view('menu.restaurant-menu-item', ['menuItem' => $menuItem, 'restaurant' => $restaurant]);
    }

    public function getList()
    {
        $restaurants = Restaurant::paginate(15);

        return view('restaurant.restaurant-list', ['restaurants' => $restaurants]);
    }
}
