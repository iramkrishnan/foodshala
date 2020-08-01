@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Menu') }}</div>
                    @foreach($restaurants as $restaurant)
                        <li><a href="/{{$restaurant->slug}}">{{$restaurant->name}}</a></li>
                    @endforeach

                </div>
                <div class="container text-center my-2">
                    {{ $restaurants->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
