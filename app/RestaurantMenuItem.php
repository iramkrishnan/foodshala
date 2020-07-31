<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantMenuItem extends Model
{
    protected $fillable = [
        'restaurant_id', 'menu_item_id',
    ];
}
