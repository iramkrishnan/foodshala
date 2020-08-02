<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Restaurant;
use App\RestaurantMenuItem;

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
        $restaurantMenuItems = $restaurant->restaurantMenuItems()->paginate(15);

        return view('restaurant.restaurant-menu', ['restaurant' => $restaurant, 'restaurantMenuItems' => $restaurantMenuItems,]);
    }

    public function getMenuItemInfo($restaurant, $menuItem, $id)
    {
        $restaurantMenuItem = RestaurantMenuItem::with('restaurant', 'menuItem')
            ->where('id', '=', $id)
            ->first();

        return view('menu.restaurant-menu-item', ['restaurantMenuItem' => $restaurantMenuItem]);
    }

    public function getList()
    {
        $restaurants = Restaurant::paginate(15);

        return view('restaurant.restaurant-list', ['restaurants' => $restaurants]);
    }
}
