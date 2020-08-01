<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Restaurant;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Restaurant::class, function (Faker $faker) {
    $restaurantSuffixes = ['Resto', 'Cafe', 'Brasserie', 'Bistro', 'Cafeteria'];
    $restaurantName = $faker->unique()->streetName . ' ' . $restaurantSuffixes[array_rand($restaurantSuffixes)];

    return [
        'name' => $restaurantName,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'cuisine' => rand(0, 1) ? 'vegetarian' : 'non-vegetarian',
        'slug' => Str::slug($restaurantName),
        'password' => bcrypt('password'),
    ];
});
