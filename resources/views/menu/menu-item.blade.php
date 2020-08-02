@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>{{$menuItem->menu_item}}</h2></div>
                    <h4>Available at the following restaurants:</h4>
                    @foreach($restaurants as $restaurant)
                        <li>
                           <a href="/{{$restaurant->slug}}/{{$menuItem->slug}}/{{$restaurant->pivot->id}}">  {{$restaurant->name}} for <strong>&#8377; {{$restaurant->pivot->price}} </strong> ({{$restaurant->pivot->type}})
                            @if ($restaurant->pivot->description !== null)
                                - {{$restaurant->pivot->description}}
                            @endif
                           </a>
                        </li>
                    @endforeach
                </div>
                <div class="container text-center my-2">
                    {{ $restaurants->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
