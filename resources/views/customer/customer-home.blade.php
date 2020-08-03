@extends('layouts.base')

@section('content')

    <section class="text-gray-700 body-font">
        <div class="container px-5 pt-12 mx-auto">
            <div class="flex flex-wrap w-full mb-5 flex-col items-center text-center">
                <h1 class="sm:text-3xl text-3xl font-medium title-font mb-2 text-gray-900">
                    Your Orders</h1>
            </div>
        </div>
    </section>

    <section class="text-gray-700 body-font overflow-hidden">
        <div class="container px-5 pb-24 mx-auto">
            <div class="flex flex-wrap -m-4">

                @foreach($orders as $order)

                    <h1 class="text-xl mt-5"><strong>Order #{{$order->id}} <p>Ordered on: {{$order->created_at}}</p> <p class="text-2xl">Total Cost: &#8377; {{ $order->total_amount }}</p></strong></h1>
                    <div class="p-4 w-full">
                        <div class="h-full p-6 rounded-lg border-2 border-gray-300 flex flex-col relative overflow-hidden">
                            <div class="flex flex-wrap -m-4">

                                @foreach($order->orderDetails as $orderDetail)

                                    <div class="p-4 xl:w-1/4 md:w-1/2 w-full">
                                        <div class="h-full p-6 rounded-lg border-2 border-gray-300 flex flex-col relative overflow-hidden">

                                            <img src="{{$orderDetail->restaurantMenuItem->image}}" alt="" class="img-thumbnail mb-2 rounded-lg">

                                            <h2 class="text-xl tracking-widest title-font mb-1 font-medium uppercase"><strong>
                                                    <a href="/{{$orderDetail->restaurantMenuItem->menuItem->menu_item}}/{{$orderDetail->restaurantMenuItem->restaurant->slug}}/{{$orderDetail->restaurantMenuItem->id}}" class="text-uppercase"> {{$orderDetail->restaurantMenuItem->menuItem->menu_item}}   </a></strong></h2>

                                            <h2 class="text-3xl text-gray-900 leading-none flex items-center pb-4 mb-4 border-b border-gray-200">
                                                <span>&#8377; {{$orderDetail->restaurantMenuItem->price}}</span>
                                            </h2>

                                            <p class="flex items-center mb-2">
                                        <span class="w-4 h-4 mr-2 inline-flex items-center justify-center text-white rounded-full flex-shrink-0">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M13.025 1l-2.847 2.828 6.176 6.176h-16.354v3.992h16.354l-6.176 6.176 2.847 2.828 10.975-11z"/></svg>
                                        </span>
                                                <a href="/{{$orderDetail->restaurantMenuItem->restaurant->slug}}">

                                                    {{$orderDetail->restaurantMenuItem->restaurant->name}}
                                                </a>

                                            </p>
                                            <p class="flex items-center mb-2">
                                        <span class="w-4 h-4 mr-2 inline-flex items-center justify-center text-white rounded-full flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M13.025 1l-2.847 2.828 6.176 6.176h-16.354v3.992h16.354l-6.176 6.176 2.847 2.828 10.975-11z"/></svg>
                                        </span>
                                                @if($orderDetail->restaurantMenuItem->type == 'non-vegetarian')
                                                    <span style="color: red">{{$orderDetail->restaurantMenuItem->type}}</span> <br>
                                                @else()
                                                    <span style="color: green">{{$orderDetail->restaurantMenuItem->type}}</span><br>
                                                @endif
                                            </p>

                                            <p class="flex items-center mb-2">
                                        <span class="w-4 h-4 mr-2 inline-flex items-center justify-center text-white rounded-full flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M13.025 1l-2.847 2.828 6.176 6.176h-16.354v3.992h16.354l-6.176 6.176 2.847 2.828 10.975-11z"/></svg>
                                        </span>
                                                Quantity: {{$orderDetail->quantity}}
                                            </p>

                                            @if($orderDetail->restaurantMenuItem->description)
                                                <p class="flex items-center mb-2">
                                        <span class="w-4 h-4 mr-2 inline-flex items-center justify-center text-white rounded-full flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M13.025 1l-2.847 2.828 6.176 6.176h-16.354v3.992h16.354l-6.176 6.176 2.847 2.828 10.975-11z"/></svg>
                                        </span>
                                                    {{$orderDetail->restaurantMenuItem->description}}
                                                </p>
                                            @endif

                                        </div>
                                    </div>

                                @endforeach

                            </div>
                        </div>
                    </div>

                @endforeach


            </div>
            <div class="my-5">
                {{ $orders->links() }}
            </div>
        </div>
    </section>

@endsection
