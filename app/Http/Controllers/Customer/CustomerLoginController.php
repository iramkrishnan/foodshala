<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\LoginFormRequest;
use Illuminate\Support\Facades\Auth;

class CustomerLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:customer');
    }

    public function getLogin()
    {
        return view('customer.customer-login');
    }

    public function postLogin(LoginFormRequest $request)
    {
        $data = $request->validated();

        $credentials = array('email' => $data['email'], 'password' => $data['password']);

        if (Auth::guard('customer')->attempt($credentials, $request->remember)) {
            return redirect()->intended(route('get.customer.home'));
        }

        return redirect()->back()->withInput();
    }
}
