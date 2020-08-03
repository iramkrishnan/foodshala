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
        $orders = Order::query()
            ->with('orderDetails')
            ->where('customer_id', '=', request()->user()->id)
            ->orderBy('created_at', 'DESC')
            ->paginate(2);

        return view('customer.customer-home', ['orders' => $orders]);
    }

    public function postCart(Request $request)
    {
        $customerCart = CustomerCart::query()
            ->where('customer_id', '=', $request->user()->id)
            ->where('restaurant_menu_item_id', '=', $request->all()['restaurant_menu_item_id'])
            ->first();

        if ($customerCart) {
            $customerCart->update([
                'quantity' => $customerCart['quantity'] + $request->all()['quantity'],
            ]);
            return redirect()->back();
        }

        CustomerCart::create([
            'customer_id' => $request->user()->id,
            'restaurant_menu_item_id' => $request->all()['restaurant_menu_item_id'],
            'quantity' => $request->all()['quantity'],
        ]);

        return redirect()->back();
    }

    public function getCart()
    {
        $data = $this->calculateCart();
        return view('cart.cart', ['cartItems' => $data['cartItems'], 'totalAmount' => $data['totalAmount']]);
    }

    public function calculateCart()
    {
        $cartItems = CustomerCart::query()
            ->where('customer_id', '=', request()->user()->id)
            ->with('restaurantMenuItem')
            ->get();

        $totalAmount = 0;
        foreach ($cartItems as $cartItem) {
            $totalAmount = $totalAmount + $cartItem['restaurantMenuItem']['price'] * $cartItem['quantity'];
        }

        return $data = [
            'cartItems' => $cartItems,
            'totalAmount' => $totalAmount,
        ];
    }

    public function getCheckout()
    {
        $data = $this->calculateCart();

        return view('customer.customer-checkout', ['totalAmount' => $data['totalAmount']]);
    }

    public function postOrder()
    {
        $data = $this->calculateCart();

        $order = Order::create([
            'customer_id' => request()->user()->id,
            'total_amount' => $data['totalAmount'],
        ]);

        foreach ($data['cartItems'] as $cartItem) {
            OrderDetail::create([
                'order_id' => $order->id,
                'restaurant_id' => $cartItem['restaurantMenuItem']['restaurant']['id'],
                'restaurant_menu_item_id' => $cartItem['restaurantMenuItem']['id'],
                'quantity' => $cartItem->quantity,
            ]);
        }

        CustomerCart::query()
            ->where('customer_id', '=', request()->user()->id)
            ->delete();

        return 'Order Placed';
    }
}
