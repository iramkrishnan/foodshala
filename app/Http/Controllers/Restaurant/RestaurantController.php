<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;

class RestaurantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:restaurant');
    }

    public function getHome()
    {
        return view('restaurant.restaurant-home');
    }
}
