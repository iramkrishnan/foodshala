<?php

namespace App\Http\Services\Customer;

use App\CustomerCart;
use App\Events\OrderPlacedEvent;
use App\Order;
use App\OrderDetail;

class OrderManagerService
{
    public function postOrder($data)
    {
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

        CustomerCart::query()
            ->where('customer_id', '=', request()->user()->id)
            ->delete();

        $customerData = [
            'type' => 'customer',
            'name' => $order->customer()->first()['name'],
            'orderId' => $order->id,
            'email' => $order->customer()->first()['email'],
        ];

        event(new OrderPlacedEvent($customerData));

        return $order->id;
    }
}
