<?php

namespace App\Http\Services\Customer;

use App\CustomerCart;

class CartManagerService
{
    public function postCart($request)
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

        return true;
    }

    public function calculateCart($request)
    {
        $cartItems = CustomerCart::query()
            ->where('customer_id', '=', $request->user()->id)
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
}
