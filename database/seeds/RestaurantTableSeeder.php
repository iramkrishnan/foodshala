<?php

use App\Restaurant;
use App\RestaurantMenuItem;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class RestaurantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $dietType = ['vegetarian', 'non-vegetarian'];

        factory(Restaurant::class, 150)->make()->each(function (Restaurant $restaurant, $key) use ($dietType, $faker) {
            $restaurant->email = $key . '@' . $key;
            $restaurant->save();

            factory(RestaurantMenuItem::class, 50)->make()->each(function (RestaurantMenuItem $restaurantMenuItem) use ($dietType, $restaurant, $faker) {
                $restaurantMenuItem->menu_item_id = $faker->numberBetween(1, 200);
                $restaurantMenuItem->restaurant_id = $restaurant->id;
                $restaurantMenuItem->type = $restaurant->type == 'vegetarian' ? 'vegetarian' : $dietType[array_rand($dietType)];
                $restaurantMenuItem->save();
            });
        });
    }
}
