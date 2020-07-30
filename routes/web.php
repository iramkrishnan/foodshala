<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('restaurant')->group(function () {

    Route::get('register', 'Restaurant\RestaurantRegisterController@getRegister')->name('get.restaurant.register');
    Route::post('register', 'Restaurant\RestaurantRegisterController@postRegister')->name('post.restaurant.register');

    Route::get('login', 'Restaurant\RestaurantLoginController@getLogin')->name('get.restaurant.login');
    Route::post('login', 'Restaurant\RestaurantLoginController@postLogin')->name('post.restaurant.login');

    Route::get('', 'Restaurant\RestaurantController@getHome')->name('get.restaurant.home');
});
