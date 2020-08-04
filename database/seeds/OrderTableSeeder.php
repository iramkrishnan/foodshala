<?php

use App\Order;
use App\OrderDetail;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param Faker $faker
     * @return void
     */
    public function run(Faker $faker)
    {
        factory(Order::class, 1000)->create()->each(function (Order $order) use ($faker) {

            factory(OrderDetail::class, 5)->create()->each(function (OrderDetail $orderDetail) use ($order, $faker) {
                $orderDetail->order_id = $order->id;
                $orderDetail->restaurant_id = $faker->numberBetween(1, 150);
                $orderDetail->restaurant_menu_item_id = $faker->numberBetween(1, 7500);
                $orderDetail->quantity = $faker->numberBetween(1, 4);
                $orderDetail->save();
            });
        });
    }
}
