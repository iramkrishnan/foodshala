<?php

namespace App\Http\Controllers\Customer;

use App\CustomerCart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:customer');
    }

    public function getHome()
    {
        return view('customer.customer-home');
    }

    public function postCart(Request $request)
    {
        $customerCart = CustomerCart::query()
            ->where('customer_id', '=', $request->user()->id)
            ->where('restaurant_id', '=', $request->all()['restaurant_id'])
            ->where('menu_item_id', '=', $request->all()['menu_item_id'])
            ->where('menu_item_price', '=', $request->all()['menu_item_price'])
            ->where('menu_item_type', '=', $request->all()['menu_item_type'])
            ->first();

        if($customerCart) {
            $customerCart->update([
                'quantity' => $customerCart['quantity'] + 1,
            ]);
            return redirect()->back();
        }

        CustomerCart::create([
            'customer_id' => $request->user()->id,
            'restaurant_id' => $request->all()['restaurant_id'],
            'menu_item_id' => $request->all()['menu_item_id'],
            'menu_item_price' => $request->all()['menu_item_price'],
            'menu_item_type' => $request->all()['menu_item_type'],
        ]);

        return redirect()->back();
    }

    public function getCart()
    {
        $cartItems = CustomerCart::query()
            ->where('customer_id', '=', request()->user()->id)
            ->with('restaurant', 'menuItem')
            ->get();

        $total = 0;
        foreach ($cartItems as $cartItem) {
            $total =  $total + $cartItem['menu_item_price'] * $cartItem['quantity'];
        }

        return view('cart.cart', ['cartItems' => $cartItems, 'total' => $total]);
    }
}
