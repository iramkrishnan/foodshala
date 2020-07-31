<?php

namespace App\Http\Services\Customer;

use App\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterManagerService
{
    public function store($data)
    {
        $customer = new Customer();
        $customer->name = $data['name'];
        $customer->email = $data['email'];
        $customer->phone = $data['phone'];
        $customer->address = $data['address'];
        $customer->diet_type = $data['diet-type'];
        $customer->password = Hash::make($data['password']);
        $customer->save();
    }

    public function login($data, $remember)
    {
        $credentials = array('email' => $data['email'], 'password' => $data['password']);
        Auth::guard('customer')->attempt($credentials, $remember);
    }
}
