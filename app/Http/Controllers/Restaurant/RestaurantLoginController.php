<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant\LoginFormRequest;
use Illuminate\Support\Facades\Auth;

class RestaurantLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:restaurant');
    }

    public function getLogin()
    {
        return view('auth.restaurant-login');
    }

    public function postLogin(LoginFormRequest $request)
    {
        $data = $request->validated();

        $credentials = array('email' => $data['email'], 'password' => $data['password']);

        if (Auth::guard('restaurant')->attempt($credentials, $request->remember)) {
            return redirect()->intended(route('get.restaurant.home'));
        }

        return redirect()->back()->withInput();
    }
}
