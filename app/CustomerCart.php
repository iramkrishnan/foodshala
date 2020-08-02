<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CustomerCart extends Model
{
    protected $fillable = [
        'customer_id', 'restaurant_menu_item_id','quantity',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function restaurantMenuItem(): BelongsTo
    {
        return $this->belongsTo(RestaurantMenuItem::class)->with('menuItem', 'restaurant');
    }
}
