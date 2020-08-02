@extends('layouts.customer')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>{{ __('Checkout Summary') }}</h2></div>

                    <h4 class="mt-2"> Your total price is : {{$totalAmount}}</h4>

                </div>
                <form action="{{route('post.customer.order')}}" method="POST">
                    @csrf
                    <button class="mt-2">Confirm and Checkout</button>
                </form>

            </div>
        </div>
    </div>
@endsection
