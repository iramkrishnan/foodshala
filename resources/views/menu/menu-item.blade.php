@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>{{$menuItem->menu_item}}</h2></div>
                    <h4>Available at the following restaurants:</h4>
                    @foreach($restaurants as $menuItem)
                        <li>{{$menuItem->name}} for <strong>&#8377; {{$menuItem->pivot->price}} </strong> ({{$menuItem->pivot->type}})
                            @if ($menuItem->pivot->description !== null)
                                - {{$menuItem->pivot->description}}
                            @endif
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
