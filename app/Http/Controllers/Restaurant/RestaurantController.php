<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Http\Services\Restaurant\HomePageManagerService;
use App\Restaurant;
use App\RestaurantMenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RestaurantController extends Controller
{
    public HomePageManagerService $homePageManagerService;

    public function __construct(HomePageManagerService $homePageManagerService)
    {
        $this->homePageManagerService = $homePageManagerService;
        $this->middleware('auth:restaurant', ['except' => ['getMenuItemInfo', 'getMenu', 'getList', 'search']]);
    }

    public function getHome()
    {
        $orders = $this->homePageManagerService->getOrders();

        return view('restaurant.restaurant-home', ['orders' => $orders]);
    }

    public function getMenu(Restaurant $restaurant)
    {
        $restaurantMenuItems = $restaurant
            ->restaurantMenuItems()
            ->paginate(8);

        return view('restaurant.restaurant-menu', ['restaurant' => $restaurant, 'restaurantMenuItems' => $restaurantMenuItems]);
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
        $restaurants = Restaurant::orderByDesc('created_at')->paginate(16);

        return view('restaurant.list', ['restaurants' => $restaurants]);
    }

    public function search(Request $request)
    {
        $restaurants = '';
        if ($request->ajax()) {
            $restaurants = DB::table('restaurants')
                ->where('name', 'LIKE', '%' . $request->search . "%")
                ->get();
        }
        return Response($restaurants);
    }
}
