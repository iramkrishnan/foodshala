@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>{{$restaurant->name}} </h2></div>
                    <li>Cuisine Type: {{$restaurant->cuisine}}</li>
                    <li>Phone: {{$restaurant->phone}}</li>
                    <li>Address: {{$restaurant->address}}</li>
                    <li>Email ID: {{$restaurant->email}}</li>
                    <img src="{{$restaurant->image}}" class="w-100">


                </div>
                <br>
                <br>
                <div class="card">
                    <div class="card-header"><h2>Menu</h2></div>

                    @foreach($restaurantMenuItems as $restaurantMenuItem)
                        <li>
                            <a href="/{{$restaurant->slug}}/{{$restaurantMenuItem->menuItem->slug}}/{{$restaurantMenuItem->id}}">{{$restaurantMenuItem->menuItem->menu_item}}
                                | Price: &#8377; {{$restaurantMenuItem->price}}
                                | {{$restaurantMenuItem->type}}
                            </a></li>
{{--                        <li>Photo: {{$restaurantMenuItem->photo}}</li>--}}
                    @endforeach
                </div>

                <div class="container text-center my-2">
                    {{ $restaurantMenuItems->links() }}
                </div>


            </div>
        </div>
    </div>
@endsection
