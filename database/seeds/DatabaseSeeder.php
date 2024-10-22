<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CustomerTableSeeder::class);
        $this->call(MenuItemTableSeeder::class);
        $this->call(RestaurantTableSeeder::class);
        $this->call(OrderTableSeeder::class);
    }
}
