<?php

namespace App\Http\Services\Restaurant;

use App\Events\NewUserRegisteredEvent;
use App\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterManagerService
{
    public function store($data)
    {
        $restaurant = new Restaurant();
        $restaurant->name = $data['name'];
        $restaurant->email = $data['email'];
        $restaurant->phone = $data['phone'];
        $restaurant->address = $data['address'];
        $restaurant->cuisine = $data['cuisine'];
        $restaurant->slug = $this->makeSlug($data['name']);
        $restaurant->password = Hash::make($data['password']);

        if (request('image')) {
            $imagePath = request('image')->store('uploads', 'public');
            $restaurant->image = '/storage/' . $imagePath;
        }

        $restaurant->save();

        event(new NewUserRegisteredEvent($restaurant));
    }

    public function login($data, $remember)
    {
        $credentials = array('email' => $data['email'], 'password' => $data['password']);
        Auth::guard('restaurant')->attempt($credentials, $remember);
    }

    public function makeSlug($name)
    {
        $slug = Str::slug($name);

        $count = Restaurant::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();

        return $count ? "{$slug}-{$count}" : $slug;
    }
}
