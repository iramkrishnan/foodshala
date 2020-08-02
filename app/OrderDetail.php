<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDetail extends Model
{
    protected $fillable = [
        'order_id', 'restaurant_id', 'menu_item_id', 'quantity', 'menu_item_type', 'menu_item_price',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
