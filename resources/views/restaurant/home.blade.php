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

                @foreach($orders as $orderId => $order)

                    <h1 class="text-xl mt-5"><strong>Order #{{$orderId}} <p>Ordered on: {{$order[0]->order->created_at}}</p> </strong></h1>
                    <div class="p-4 w-full">
                        <div class="h-full p-6 rounded-lg border-2 border-gray-300 flex flex-col relative overflow-hidden">
                            <div class="flex flex-wrap -m-4">

                                    <div class="p-4 w-full">
                                        <div class="h-full p-6 rounded-lg border-2 border-gray-300 flex flex-col relative overflow-hidden">

                                            <h2 class="text-xl tracking-widest title-font mb-1 font-medium uppercase"><strong>
                                                    <span class="text-uppercase"> Customer Details </span></strong></h2>

                                            <p class="flex items-center mb-2">
                                        <span class="w-4 h-4 mr-2 inline-flex items-center justify-center text-white rounded-full flex-shrink-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 2c2.757 0 5 2.243 5 5.001 0 2.756-2.243 5-5 5s-5-2.244-5-5c0-2.758 2.243-5.001 5-5.001zm0-2c-3.866 0-7 3.134-7 7.001 0 3.865 3.134 7 7 7s7-3.135 7-7c0-3.867-3.134-7.001-7-7.001zm6.369 13.353c-.497.498-1.057.931-1.658 1.302 2.872 1.874 4.378 5.083 4.972 7.346h-19.387c.572-2.29 2.058-5.503 4.973-7.358-.603-.374-1.162-.811-1.658-1.312-4.258 3.072-5.611 8.506-5.611 10.669h24c0-2.142-1.44-7.557-5.631-10.647z"/></svg>                                        </span>
                                                <span>Name: {{$order[0]->order->customer->name}}</span>

                                            </p>

                                            <p class="flex items-center mb-2">
                                        <span class="w-4 h-4 mr-2 inline-flex items-center justify-center text-white rounded-full flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20 22.621l-3.521-6.795c-.008.004-1.974.97-2.064 1.011-2.24 1.086-6.799-7.82-4.609-8.994l2.083-1.026-3.493-6.817-2.106 1.039c-7.202 3.755 4.233 25.982 11.6 22.615.121-.055 2.102-1.029 2.11-1.033z"/></svg>                                        </span>
                                                <span>Phone: {{$order[0]->order->customer->phone}}</span>

                                            </p>

                                            <p class="flex items-center mb-2">
                                        <span class="w-4 h-4 mr-2 inline-flex items-center justify-center text-white rounded-full flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 2c3.196 0 6 2.618 6 5.602 0 3.093-2.493 7.132-6 12.661-3.507-5.529-6-9.568-6-12.661 0-2.984 2.804-5.602 6-5.602m0-2c-4.198 0-8 3.403-8 7.602 0 4.198 3.469 9.21 8 16.398 4.531-7.188 8-12.2 8-16.398 0-4.199-3.801-7.602-8-7.602zm0 11c-1.657 0-3-1.343-3-3s1.343-3 3-3 3 1.343 3 3-1.343 3-3 3z"/></svg>                                        </span>
                                                <span>Address: {{$order[0]->order->customer->address}}</span>
                                            </p>

                                            <p class="flex items-center mb-2">
                                        <span class="w-4 h-4 mr-2 inline-flex items-center justify-center text-white rounded-full flex-shrink-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12.042 23.648c-7.813 0-12.042-4.876-12.042-11.171 0-6.727 4.762-12.125 13.276-12.125 6.214 0 10.724 4.038 10.724 9.601 0 8.712-10.33 11.012-9.812 6.042-.71 1.108-1.854 2.354-4.053 2.354-2.516 0-4.08-1.842-4.08-4.807 0-4.444 2.921-8.199 6.379-8.199 1.659 0 2.8.876 3.277 2.221l.464-1.632h2.338c-.244.832-2.321 8.527-2.321 8.527-.648 2.666 1.35 2.713 3.122 1.297 3.329-2.58 3.501-9.327-.998-12.141-4.821-2.891-15.795-1.102-15.795 8.693 0 5.611 3.95 9.381 9.829 9.381 3.436 0 5.542-.93 7.295-1.948l1.177 1.698c-1.711.966-4.461 2.209-8.78 2.209zm-2.344-14.305c-.715 1.34-1.177 3.076-1.177 4.424 0 3.61 3.522 3.633 5.252.239.712-1.394 1.171-3.171 1.171-4.529 0-2.917-3.495-3.434-5.246-.134z"/></svg>                                        </span>
                                                <span>Email: {{$order[0]->order->customer->email}}</span>
                                            </p>


                                        </div>
                                    </div>

                                @foreach($order as $orderDetails)

                                    <div class="p-4 xl:w-1/4 w-full">
                                        <div class="h-full p-6 rounded-lg border-2 border-gray-300 flex flex-col relative overflow-hidden">

                                            <h2 class="text-xl tracking-widest title-font mb-1 font-medium uppercase"><strong>
                                                    <span class="text-uppercase"> Order Details </span></strong></h2>

                                            <p class="flex items-center mb-2">
                                                <span class="text-2xl" >{{$orderDetails->restaurantMenuItem->menuItem->menu_item}}</span>

                                            </p>

                                            <p class="flex items-center mb-2">
                                                @if($orderDetails->restaurantMenuItem->type == 'non-vegetarian')
                                                    <span style="color: red">{{$orderDetails->restaurantMenuItem->type}}</span> <br>
                                                @else()
                                                    <span style="color: green">{{$orderDetails->restaurantMenuItem->type}}</span><br>
                                                @endif

                                            </p>

                                            <p class="flex items-center mb-2">
                                                <span>Quantity: {{$orderDetails->quantity}}</span>

                                            </p>

                                            <p class="flex items-center mb-2">

                                                <span>Price: &#8377; {{$orderDetails->restaurantMenuItem->price}}</span>

                                            </p>


                                            @if($orderDetails->restaurantMenuItem->description)
                                            <p class="flex items-center mb-2">
                                                <span>Description: {{$orderDetails->restaurantMenuItem->description}}</span>
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
{{--                {{ $orders->links() }}--}}
            </div>
        </div>
    </section>

@endsection
