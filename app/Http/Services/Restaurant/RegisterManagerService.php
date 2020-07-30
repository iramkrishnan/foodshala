<?php


namespace App\Http\Services\Restaurant;

use App\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterManagerService
{
    public function store($data)
    {
        $restaurant = new Restaurant();
        $restaurant->name = $data['name'];
        $restaurant->email = $data['email'];
        $restaurant->password = Hash::make($data['password']);
        $restaurant->save();
    }

    public function login($data, $remember)
    {
        $credentials = array('email' => $data['email'], 'password' => $data['password']);
        Auth::guard('restaurant')->attempt($credentials, $remember);
    }
}
