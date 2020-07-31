<?php

namespace App\Http\Services\Restaurant;

use Illuminate\Support\Facades\Auth;

class LoginManagerService
{
    public function login($data, $remember)
    {
        $credentials = array('email' => $data['email'], 'password' => $data['password']);

        if (Auth::guard('restaurant')->attempt($credentials, $remember)) {
            return redirect()->intended(route('get.restaurant.home'));
        }

        return redirect()->back()->withInput();
    }
}
