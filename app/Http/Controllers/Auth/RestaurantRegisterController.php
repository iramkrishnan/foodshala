<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant\RegisterFormRequest;
use App\Http\Services\Restaurant\RegisterManagerService;
use Illuminate\Foundation\Auth\RegistersUsers;

class RestaurantRegisterController extends Controller
{
    use RegistersUsers;
    public RegisterManagerService $registerManagerService;

    public function __construct(RegisterManagerService $registerManagerService)
    {
        $this->registerManagerService = $registerManagerService;
        $this->middleware('guest:restaurant');
    }

    public function getRegister()
    {
        return view('auth.restaurant-register');
    }

    public function postRegister(RegisterFormRequest $request)
    {
        $data = $request->validated();

        $this->registerManagerService->store($data);
        $this->registerManagerService->login($data, $request->remember);

        return redirect()->route('get.restaurant.home');
    }
}
