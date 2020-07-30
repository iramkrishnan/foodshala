<?php

namespace App\Http\Controllers;

class RestaurantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:restaurant');
    }

    public function getHome()
    {
        return view('restaurant-home');
    }
}
