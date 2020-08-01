@extends('layouts.customer')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>{{ __('Your Cart') }}</h2></div>
                    @foreach($cartItems as $cartItem)
                        <li class="my-1">
                            Food: {{$cartItem->menuItem->menu_item}} ({{$cartItem->menu_item_type}}) |
                            Quantity: {{$cartItem->quantity}} |
                            at Rs. {{$cartItem->menu_item_price}} per piece |
                            from {{$cartItem->restaurant->name}}
                        </li>
                        <hr>
                    @endforeach

                    <h4 class="mt-2">Total Price: {{$total}}</h4>
                </div>
            </div>
        </div>
    </div>
@endsection
