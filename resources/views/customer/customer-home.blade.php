@extends('layouts.customer')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Customer Dashboard') }}</div>

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

            @foreach($orders as $order)
            <div class="col-md-8 mt-2">
                <div class="card">
                    <div class="card-header">Order #{{$order->id}} <p>Ordered on: {{$order->created_at}}</p></div>
                    <div class="card-body">
                        @foreach($order->orderDetails as $orderDetail)

                        <li>
                            <a href="/{{$orderDetail->restaurantMenuItem->restaurant->slug}}">Restaurant: {{$orderDetail->restaurantMenuItem->restaurant->name}} </a> <br>
                            Food Item: {{$orderDetail->restaurantMenuItem->menuItem->menu_item}}

                            @if($orderDetail->restaurantMenuItem->type == 'non-vegetarian')
                            (<strong style="color: red">{{$orderDetail->restaurantMenuItem->type}}</strong>) <br>
                            @else()
                            (<strong style="color: green">{{$orderDetail->restaurantMenuItem->type}}</strong>) <br>
                            @endif

                            Quantity: {{$orderDetail->quantity}} <br>
                            Price: {{$orderDetail->restaurantMenuItem->price}} <br>

                            Description: {{$orderDetail->restaurantMenuItem->description}} <br>



                        </li>
                        <hr>
                        @endforeach
                        <h4> Total Amount: &#8377; {{ $order->total_amount }}</h4>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
@endsection
