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
        factory(Customer::class, 250)->make()->each(function (Customer $customer, $key) {
            $customer->email = 'c' . $key . '@' . $key;
            $customer->save();
        });
    }
}
