<?php


namespace App\Http\Services\Customer;


use Illuminate\Support\Facades\Auth;

class LoginManagerService
{
    public function login($data, $remember)
    {
        $credentials = array('email' => $data['email'], 'password' => $data['password']);

        if (Auth::guard('customer')->attempt($credentials, $remember)) {
            return redirect()->intended(route('get.customer.home'));
        }

        return redirect()->back()->withInput();
    }
}
