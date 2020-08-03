<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\LoginFormRequest;
use App\Http\Services\Customer\LoginManagerService;

class CustomerLoginController extends Controller
{
    public LoginManagerService $loginManagerService;

    public function __construct(LoginManagerService $loginManagerService)
    {
        $this->loginManagerService = $loginManagerService;
        $this->middleware('guest:customer');
    }

    public function getLogin()
    {
        return view('customer.login');
    }

    public function postLogin(LoginFormRequest $request)
    {
        $data = $request->validated();

        return $this->loginManagerService->login($data, $request->remember);
    }
}
