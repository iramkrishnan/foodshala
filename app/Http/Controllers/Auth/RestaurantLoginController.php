<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:restaurant');
    }

    public function showLogin()
    {
        return view('auth.restaurant-login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = array('email' => $request['email'], 'password' => $request['password']);

        if (Auth::guard('restaurant')->attempt($credentials, $request->remember)) {
            return redirect()->intended(route('get.restaurant.home'));
        }

        return redirect()->back()->withInput();
    }
}
