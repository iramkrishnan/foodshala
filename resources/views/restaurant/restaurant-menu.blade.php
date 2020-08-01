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


                </div>
                <br>
                <br>
                <div class="card">
                    <div class="card-header"><h2>Menu</h2></div>

                    @foreach($menuItems as $menuItem)

                        <li><a href="/{{$restaurant->slug}}/{{$menuItem->slug}}"> Menu Item: {{$menuItem->menu_item}} | Price: &#8377; {{$menuItem->pivot->price}}
                                | {{$menuItem->pivot->type}}
                            </a></li>
                        {{--                        <li>Photo: {{$menuItem->pivot->photo}}</li>--}}
                    @endforeach
                </div>

                <div class="container text-center my-2">
                    {{ $menuItems->links() }}
                </div>


            </div>
        </div>
    </div>
@endsection
