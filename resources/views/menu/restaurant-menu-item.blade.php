@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>Eat {{$restaurantMenuItem->menuItem->menu_item}} at {{$restaurantMenuItem->restaurant->name}} </h2></div>
                        <li>Menu Item: {{$restaurantMenuItem->menuItem->menu_item}}</li>
                        <li>Price: &#8377; {{$restaurantMenuItem->price}}</li>
                        <li>Diet Type: {{$restaurantMenuItem->type}}</li>

                    @if ($restaurantMenuItem->description !== null)
                        <li>Description: {{$restaurantMenuItem->description}}</li>
                    @endif
                        <img src="{{$restaurantMenuItem->image}}" class="w-100">
                </div>
                <br>
                <br>
                <div class="card">
                    <div class="card-header"><h2> <a href="/{{$restaurantMenuItem->restaurant->slug}}">Restaurant Details </a></h2></div>
                    <li>Name: {{$restaurantMenuItem->restaurant->name}}</li>
                    <li>Cuisine Type: {{$restaurantMenuItem->restaurant->cuisine}}</li>
                    <li>Phone: {{$restaurantMenuItem->restaurant->phone}}</li>
                    <li>Address: {{$restaurantMenuItem->restaurant->address}}</li>
                    <li>Email ID: {{$restaurantMenuItem->restaurant->email}}</li>
                </div>

                <form action="{{route('post.customer.cart')}}" method="POST">
                    @csrf
                    <input type="text" name="quantity" placeholder="quantity" value="1">
                    <input type="hidden" name="restaurant_menu_item_id" value="{{$restaurantMenuItem->id}}">
                    <button type="submit" class="mt-3">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
@endsection
