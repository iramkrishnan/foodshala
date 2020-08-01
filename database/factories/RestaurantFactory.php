<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Restaurant;
use Faker\Generator as Faker;

$factory->define(Restaurant::class, function (Faker $faker) {
    $restaurantSuffixes = ['Resto', 'Cafe', 'Brasserie', 'Bistro', 'Cafeteria'];

    return [
        'name' => $faker->unique()->city . ' ' . $restaurantSuffixes[array_rand($restaurantSuffixes)],
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'cuisine' => rand(0, 1) ? 'vegetarian' : 'non-vegetarian',
        'password' => bcrypt('password'),
    ];
});
