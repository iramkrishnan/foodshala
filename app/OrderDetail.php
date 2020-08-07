<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDetail extends Model
{
    protected $fillable = [
        'order_id', 'restaurant_id', 'restaurant_menu_item_id', 'quantity',
    ];

    protected $with = 'restaurantMenuItem';

    public function order(): BelongsTo
    {
        return $this
            ->belongsTo(Order::class)
            ->with('customer');
    }

    public function restaurantMenuItem(): BelongsTo
    {
        return $this
            ->belongsTo(RestaurantMenuItem::class)
            ->with('menuItem', 'restaurant');
    }

    public function menuItem(): BelongsTo
    {
        return $this->belongsTo(MenuItem::class);
    }
}
