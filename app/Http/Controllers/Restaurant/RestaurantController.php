<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\OrderDetail;
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
        $orderDetails = OrderDetail::query()
            ->where('restaurant_id', '=', request()->user()->id)
            ->with('restaurantMenuItem', 'order')
            ->orderBy('created_at', 'DESC')
            ->get();

        $orders = [];
        foreach ($orderDetails as $orderDetail) {
            $orders[$orderDetail->order_id][] = $orderDetail;
        }
        return view('restaurant.restaurant-home', ['orders' => $orders]);
    }

    public function getMenu(Restaurant $restaurant)
    {
        $restaurantMenuItems = $restaurant->restaurantMenuItems()->paginate(8);

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
        $restaurants = Restaurant::orderBy('created_at', 'DESC')->paginate(16);

        return view('restaurant.list', ['restaurants' => $restaurants]);
    }
}
