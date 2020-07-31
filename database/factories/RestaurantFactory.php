<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Restaurant;
use Faker\Generator as Faker;

$factory->define(Restaurant::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->city . ' Resto',
        'email' => $faker->email,
        'password' => bcrypt('password'),
    ];
});
