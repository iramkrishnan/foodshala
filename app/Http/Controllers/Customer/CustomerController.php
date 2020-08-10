<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Services\Customer\CartManagerService;
use App\Http\Services\Customer\HomePageManagerService;
use App\Http\Services\Customer\OrderManagerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public HomePageManagerService $homePageManagerService;
    public CartManagerService $cartManagerService;
    public OrderManagerService $orderManagerService;

    public function __construct(HomePageManagerService $homePageManagerService, CartManagerService $cartManagerService, OrderManagerService $orderManagerService)
    {
        $this->homePageManagerService = $homePageManagerService;
        $this->cartManagerService = $cartManagerService;
        $this->orderManagerService = $orderManagerService;
        $this->middleware('auth:customer');
    }

    public function getHome()
    {
        $orders = $this->homePageManagerService->getHome();

        return view('customer.customer-home', ['orders' => $orders]);
    }

    public function postCart(Request $request)
    {
        $this->cartManagerService->postCart($request);

        return redirect()->back()
            ->with('message', 'The item has been successfully added to your cart!');
    }

    public function getCart()
    {
        $data = $this->cartManagerService->calculateCart(request());

        $stripeKey = env('STRIPE_KEY');

        return view('cart.cart', ['cartItems' => $data['cartItems'], 'totalAmount' => $data['totalAmount'], 'stripeKey' => $stripeKey]);
    }

    public function postOrder()
    {
        $data = $this->cartManagerService->calculateCart(request());

        if($data['totalAmount'] == 0) {
            return redirect(route('get.customer.cart'));
        }

        $orderId = $this->orderManagerService->postOrder($data);

        return view('cart.order-confirm', ['orderId' => $orderId]);
    }
}
