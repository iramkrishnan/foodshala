<?php

namespace App\Http\Services\Menu;

use App\MenuItem;
use App\RestaurantMenuItem;
use Illuminate\Support\Str;

class MenuItemManagerService
{
    public function store($data)
    {
        $menuItem = MenuItem::firstOrCreate(
            ['menu_item' => $data['menu_item']],
            ['slug' => Str::slug($data['menu_item'])]
        );

        $restaurantMenuItem = new RestaurantMenuItem;
        $restaurantMenuItem->restaurant_id = request()->user()->id;
        $restaurantMenuItem->menu_item_id = $menuItem->id;
        $restaurantMenuItem->price = $data['price'];
        $restaurantMenuItem->type = $data['type'];
        $restaurantMenuItem->description = $data['description'];

        if (request('image')) {
            $imagePath = request('image')->store('uploads', 'public');
            $restaurantMenuItem->image = '/storage/' . $imagePath;
        }

        $restaurantMenuItem->save();
    }
}
