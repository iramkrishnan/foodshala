<?php

namespace App\Http\Controllers\Customer;

use App\CustomerCart;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDetail;
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

        $totalAmount = 0;
        foreach ($cartItems as $cartItem) {
            $totalAmount =  $totalAmount + $cartItem['menu_item_price'] * $cartItem['quantity'];
        }

        return view('cart.cart', ['cartItems' => $cartItems, 'total' => $totalAmount]);
    }

    public function getCheckout()
    {
        $cartItems = CustomerCart::query()
            ->where('customer_id', '=', request()->user()->id)
            ->get();

        $totalAmount = 0;
        foreach ($cartItems as $cartItem) {
            $totalAmount =  $totalAmount + $cartItem['menu_item_price'] * $cartItem['quantity'];
        }

        return view('customer.customer-checkout', ['total' => $totalAmount]);
    }

    public function postOrder()
    {
        $cartItems = CustomerCart::query()
            ->where('customer_id', '=', request()->user()->id)
            ->get();

        $totalAmount = 0;
        foreach ($cartItems as $cartItem) {
            $totalAmount =  $totalAmount + $cartItem['menu_item_price'] * $cartItem['quantity'];
        }

        $order = Order::create([
            'customer_id' => request()->user()->id,
            'total_amount' => $totalAmount,
        ]);

        foreach ($cartItems as $cartItem) {
            OrderDetail::create([
                'order_id' => $order->id,
                'restaurant_id' =>$cartItem->restaurant_id,
                'menu_item_id' => $cartItem->menu_item_id,
                'quantity' => $cartItem->quantity,
                'menu_item_type' => $cartItem->menu_item_type,
                'menu_item_price' => $cartItem->menu_item_price,
            ]);
        }

        CustomerCart::query()
            ->where('customer_id', '=', request()->user()->id)
            ->delete();

        return 'Order Placed';
    }
}
