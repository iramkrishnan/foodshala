<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'customer_id' => $faker->numberBetween(1, 250),
        'total_amount' => $faker->numberBetween(500, 5000),
    ];
});
