<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\MenuItem;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(MenuItem::class, function (Faker $faker) {
    $menuItem = $faker->unique()->sentence(2, false);

    return [
        'menu_item' => $menuItem,
        'slug' => Str::slug($menuItem),
    ];
});
