<?php

use App\MenuItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MenuItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents('http://13.126.22.81:8003/food');
        $data = json_decode($json, true);

        factory(MenuItem::class, 130)->make()->each(function (MenuItem $menuItem, $key) use ($data) {
            $menuItem->menu_item = $data[$key]['name'];
            $menuItem->slug = Str::slug($data[$key]['name']);
            $menuItem->save();
        });
    }
}
