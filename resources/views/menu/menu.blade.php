@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Menu') }}</div>
                    @foreach($menuItems as $menuItem)
                        <li><a href="/menu/{{$menuItem->slug}}">{{$menuItem->menu_item}}</a></li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection