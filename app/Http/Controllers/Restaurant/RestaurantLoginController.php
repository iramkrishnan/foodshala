<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant\LoginFormRequest;
use App\Http\Services\Restaurant\LoginManagerService;

class RestaurantLoginController extends Controller
{
    public LoginManagerService $loginManagerService;

    public function __construct(LoginManagerService $loginManagerService)
    {
        $this->loginManagerService = $loginManagerService;
        $this->middleware('guest:restaurant');
    }

    public function getLogin()
    {
        return view('restaurant.login');
    }

    public function postLogin(LoginFormRequest $request)
    {
        $data = $request->validated();

        return $this->loginManagerService->login($data, $request->remember);
    }
}
