<?php

use App\Customer;
use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Customer::class, 5)->make()->each(function (Customer $customer, $key) {
            $customer->email = chr(97 + $key) . '@' . chr(97 + $key);
            $customer->save();
        });
    }
}
