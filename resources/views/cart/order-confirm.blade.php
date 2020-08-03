@extends('layouts.base')

@section('content')
    <meta http-equiv="Refresh" content="5; url='{{route('get.customer.home')}}'" />

    <script src="https://cdn.jsdelivr.net/gh/mathusummut/confetti.js/confetti.min.js"></script>


    <script>
        confetti.start(21000)
        confetti.speed = 5;
    </script>

    <section class="text-gray-700 body-font">
        <div class="container px-5 pt-12 mx-auto">
            <div class="flex flex-wrap w-full mb-5 flex-col items-center text-center">
                <h1 class="sm:text-3xl text-3xl font-medium title-font mb-2 text-gray-900">
                    Congratulations, your order has been placed! - Order # {{$orderId}}
                    <br>
                    Tasty food is on its way...
                </h1>

                <p>You will be redirected to your dashboard in 5 seconds</p>
            </div>
        </div>
    </section>

@endsection
