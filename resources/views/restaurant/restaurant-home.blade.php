@extends('layouts.restaurant')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Restaurant Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>

            @foreach($orders as $orderId => $order)
                <div class="col-md-8 mt-2">
                    <div class="card">
                        <div class="card-header">Order #{{$orderId}} <p>Ordered on: {{$order[0]->order->created_at}}</p></div>
                        <div class="card-body">
                            @foreach($order as $orderDetails)

                                <li>
                                    Food Item: {{$orderDetails->restaurantMenuItem->menuItem->menu_item}} <br>
                                    Quantity: {{$orderDetails->quantity}} <br>
                                    Price: {{$orderDetails->restaurantMenuItem->price}} <br>
                                    Type: {{$orderDetails->restaurantMenuItem->type}} <br>
                                    Description: {{$orderDetails->restaurantMenuItem->description}} <br>

                                </li>
                                <hr>

                            @endforeach
                                <h3>Customer Detail</h3>

                                <p>Name: {{$order[0]->order->customer->name}}</p>
                                <p>Phone: {{$order[0]->order->customer->phone}}</p>
                                <p>Address: {{$order[0]->order->customer->address}}</p>
                                <p>Email: {{$order[0]->order->customer->email}}</p>

{{--                            <h4> Total Amount: &#8377; {{ $order->total_amount }}</h4>--}}
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
