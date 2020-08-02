@extends('layouts.customer')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>{{ __('Your Cart') }}</h2></div>
                    @foreach($cartItems as $cartItem)
                        <li class="my-1">
                            Food: {{$cartItem->restaurantMenuItem->menuItem->menu_item}} ({{$cartItem->restaurantMenuItem->type}}) |
                            Quantity: {{$cartItem->quantity}} |
                            at Rs. {{$cartItem->restaurantMenuItem->price}} per piece |
                            from {{$cartItem->restaurantMenuItem->restaurant->name}}
                        </li>
                        <hr>
                    @endforeach

                    @if($totalAmount != 0)
                        <h4 class="mt-2">Total Price: &#8377; {{$totalAmount}}</h4>


                </div>
                <button class="mt-2"><a href="{{route('get.customer.checkout')}}">Checkout</a></button>
                @endif

            </div>
        </div>
    </div>
@endsection
