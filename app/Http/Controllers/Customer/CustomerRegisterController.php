<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\RegisterFormRequest;
use App\Http\Services\Customer\RegisterManagerService;
use Illuminate\Foundation\Auth\RegistersUsers;

class CustomerRegisterController extends Controller
{
    use RegistersUsers;

    public RegisterManagerService $registerManagerService;

    public function __construct(RegisterManagerService $registerManagerService)
    {
        $this->registerManagerService = $registerManagerService;
        $this->middleware('guest:customer');
    }

    public function getRegister()
    {
        return view('customer.register');
    }

    public function postRegister(RegisterFormRequest $request)
    {
        $data = $request->validated();

        $this->registerManagerService->store($data);
        $this->registerManagerService->login($data, $request->remember);

        return redirect()->route('get.customer.home');
    }
}
