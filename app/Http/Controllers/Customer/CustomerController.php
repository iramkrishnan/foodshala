<?php

namespace App\Http\Controllers\Customer;

use App\CustomerCart;
use App\Events\OrderPlacedEvent;
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
            ->where('customer_id', '=', request()->user()->id)
            ->with('orderDetails')
            ->orderByDesc('created_at')
            ->paginate(3);

        return view('customer.customer-home', ['orders' => $orders]);
    }

    public function postCart(Request $request)
    {
        $customerCart = CustomerCart::query()
            ->where('customer_id', '=', $request->user()->id)
            ->where('restaurant_menu_item_id', '=', $request['restaurant_menu_item_id'])
            ->first();

        if ($customerCart) {
            $customerCart->update([
                'quantity' => $customerCart['quantity'] + $request['quantity'],
            ]);

            return redirect()->back()
                ->with('message', 'The item has been successfully added to your cart!');
        }

        CustomerCart::create([
            'customer_id' => $request->user()->id,
            'restaurant_menu_item_id' => $request['restaurant_menu_item_id'],
            'quantity' => $request['quantity'],
        ]);

        return redirect()->back()
            ->with('message', 'The item has been successfully added to your cart!');
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

            $restaurantData = [
                'type' => 'restaurant',
                'name' => $cartItem['restaurantMenuItem']['restaurant']['name'],
                'orderId' => $order->id,
                'email' => $cartItem['restaurantMenuItem']['restaurant']['email'],
            ];
            event(new OrderPlacedEvent($restaurantData));
        }

        $customerCart = CustomerCart::query()
            ->with('customer')
            ->where('customer_id', '=', request()->user()->id)
            ->first();

        $customerData = [
            'type' => 'customer',
            'name' => $customerCart['customer']['name'],
            'orderId' => $order->id,
            'email' => $customerCart['customer']['email'],
        ];

        event(new OrderPlacedEvent($customerData));

        $customerCart->delete();

        return view('cart.order-confirm', ['orderId' => $order->id]);
    }
}
