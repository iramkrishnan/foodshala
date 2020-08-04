<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\OrderDetail;
use Faker\Generator as Faker;

$factory->define(OrderDetail::class, function (Faker $faker) {
    return [
        'order_id' => '1',
        'restaurant_id' => '1',
        'restaurant_menu_item_id' => '1',
        'quantity' => '1',
    ];
});
