@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>{{$menuItem->menu_item}}</h2></div>
                    <h4>Available at the following restaurants:</h4>
                    @foreach($menuItem->restaurants as $menuItem)
                        <li> {{$menuItem->name}}</li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
