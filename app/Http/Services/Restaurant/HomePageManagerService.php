<?php

namespace App\Http\Services\Restaurant;

use App\OrderDetail;

class HomePageManagerService
{
    public function getOrders()
    {
        $orderDetails = OrderDetail::query()
            ->where('restaurant_id', '=', request()->user()->id)
            ->with('restaurantMenuItem', 'order')
            ->orderByDesc('created_at')
            ->get();

        $orders = [];
        foreach ($orderDetails as $orderDetail) {
            $orders[$orderDetail->order_id][] = $orderDetail;
        }

        return $orders;
    }
}
