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
                    <div class="card-header">Order #{{$order->id}}</div>
                    <div class="card-body">
                        @foreach($order->orderDetails as $orderDetail)

                        <li>
                            Quantity: {{$orderDetail->quantity}} |
                            Price: {{$orderDetail->restaurantMenuItem->price}} |
                            Type: {{$orderDetail->restaurantMenuItem->type}} |
                            Description: {{$orderDetail->restaurantMenuItem->description}} |
                            Food Item: {{$orderDetail->restaurantMenuItem->menuItem->menu_item}} |
                            Restaurant: {{$orderDetail->restaurantMenuItem->restaurant->name}} |

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
