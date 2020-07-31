<?php

namespace App\Http\Services\Menu;

use App\MenuItem;
use App\RestaurantMenuItem;

class MenuItemManagerService
{
    public function store($data)
    {
        $menuItem = MenuItem::firstOrCreate(
            ['menu_item' => $data['menu_item']],
        );

        RestaurantMenuItem::firstOrCreate([
            'restaurant_id' => request()->user()->id,
            'menu_item_id' => $menuItem->id,
        ]);
    }
}
