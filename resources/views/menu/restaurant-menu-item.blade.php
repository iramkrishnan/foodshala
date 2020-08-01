@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>Eat {{$menuItem->menu_item}} at {{$restaurant->name}} </h2></div>
                        <li>Menu Item: {{$menuItem->menu_item}}</li>
                        <li>Price: &#8377; {{$menuItem->pivot->price}}</li>
                        <li>Diet Type: {{$menuItem->pivot->type}}</li>

                    @if ($menuItem->pivot->description !== null)
                        <li>Description: {{$menuItem->pivot->description}}</li>
                    @endif
                        <li>Photo: {{$menuItem->pivot->photo}}</li>
                </div>
                <br>
                <br>
                <div class="card">
                    <div class="card-header"><h2> <a href="/{{$restaurant->slug}}">Restaurant Details </a></h2></div>
                    <li>Name: {{$restaurant->name}}</li>
                    <li>Cuisine Type: {{$restaurant->cuisine}}</li>
                    <li>Phone: {{$restaurant->phone}}</li>
                    <li>Address: {{$restaurant->address}}</li>
                    <li>Email ID: {{$restaurant->email}}</li>
                </div>
                <button class="mt-3">Order here</button>

            </div>
        </div>
    </div>
@endsection
