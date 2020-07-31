<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\RestaurantMenuItem;
use Faker\Generator as Faker;

$factory->define(RestaurantMenuItem::class, function (Faker $faker) {
    return [
        'restaurant_id' => 1,
        'menu_item_id' => 1,
        'price' => rand(100, 1000),
        'type' => rand(0, 1) ? 'vegetarian' : 'non-vegetarian',
        'description' => rand(0, 1) ? $faker->sentence : null,
    ];
});
