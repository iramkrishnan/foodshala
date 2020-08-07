<?php

namespace App\Http\Services\Customer;

use App\Order;

class HomePageManagerService
{
    public function getHome()
    {
        return Order::query()
            ->where('customer_id', '=', request()->user()->id)
            ->with('orderDetails')
            ->orderByDesc('created_at')
            ->paginate(3);
    }
}
