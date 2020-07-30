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

Route::prefix('customer')->group(function () {

    Route::get('register', 'Customer\CustomerRegisterController@getRegister')->name('get.customer.register');
    Route::post('register', 'Customer\CustomerRegisterController@postRegister')->name('post.customer.register');

    Route::get('login', 'Customer\CustomerLoginController@getLogin')->name('get.customer.login');
    Route::post('login', 'Customer\CustomerLoginController@postLogin')->name('post.customer.login');

    Route::get('', 'Customer\CustomerController@getHome')->name('get.customer.home');
});
