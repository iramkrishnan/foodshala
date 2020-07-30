<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('restaurant')->group(function () {

    Route::get('register', 'Auth\RestaurantRegisterController@getRegister')->name('get.restaurant.register');
    Route::post('register', 'Auth\RestaurantRegisterController@postRegister')->name('post.restaurant.register');

    Route::get('login', 'Auth\RestaurantLoginController@getLogin')->name('get.restaurant.login');
    Route::post('login', 'Auth\RestaurantLoginController@postLogin')->name('post.restaurant.login');

    Route::get('', 'RestaurantController@getHome')->name('get.restaurant.home');
});
