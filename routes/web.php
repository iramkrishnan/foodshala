<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('restaurant')->group(function () {

    Route::get('register', 'Auth\RestaurantRegisterController@showRegister')->name('get.restaurant.register');
    Route::post('register', 'Auth\RestaurantRegisterController@postRegister')->name('post.restaurant.register');

    Route::get('login', 'Auth\RestaurantLoginController@showLogin')->name('get.restaurant.login');
    Route::post('login', 'Auth\RestaurantLoginController@postLogin')->name('post.restaurant.login');

    Route::get('', 'RestaurantController@home')->name('get.restaurant.home');
});
