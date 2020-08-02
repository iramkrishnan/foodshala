<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home.home');

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

Route::prefix('menu')->group(function () {

    Route::get('', 'Menu\MenuController@getList')->name('get.menu.list');
    Route::get('add', 'Menu\MenuController@getAdd')->name('get.menu.add');
    Route::post('add', 'Menu\MenuController@postAdd')->name('post.menu.add');

    Route::get('{menuItem:slug}', 'Menu\MenuController@getInfo')->name('get.menu.info');
});

Route::prefix('cart')->group(function () {
    Route::get('', 'Customer\CustomerController@getCart')->name('get.customer.cart');
    Route::post('', 'Customer\CustomerController@postCart')->name('post.customer.cart');
});

Route::prefix('checkout')->group(function () {
    Route::get('', 'Customer\CustomerController@getCheckout')->name('get.customer.checkout');
    Route::post('', 'Customer\CustomerController@postOrder')->name('post.customer.order');
});

Route::get('restaurants', 'Restaurant\RestaurantController@getList')->name('get.restaurant.list');

Route::get('{restaurant_slug}/{menu_item_slug}/{id}', 'Restaurant\RestaurantController@getMenuItemInfo')->name('get.restaurant.menu_item_info');

Route::get('{restaurant:slug}', 'Restaurant\RestaurantController@getMenu')->name('get.restaurant.info');
