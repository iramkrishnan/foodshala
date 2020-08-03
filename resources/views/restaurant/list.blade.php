@extends('layouts.base')

@section('content')

    <section class="text-gray-700 body-font">
        <div class="container px-5 pt-12 mx-auto">
            <div class="flex flex-wrap w-full mb-20 flex-col items-center text-center">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">
                    Order from the best restaurants in town</h1>
            </div>
        </div>
    </section>

    <section class="text-gray-700 body-font">
        <div class="container px-5 pb-24 mx-auto">
            <div class="flex flex-wrap -m-4">

                @foreach($restaurants as $restaurant)

                    <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                        <a class="block relative h-48 rounded overflow-hidden" href="/{{$restaurant->slug}}">
                            <img alt="" class="object-cover object-center w-full h-full block" src="{{$restaurant->image}}">
                        </a>
                        <div class="mt-4">
                            <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1"><a href="/{{$restaurant->slug}}">Restaurant</a></h3>
                            <h1 class="text-gray-900 title-font text-lg font-medium"><a href="/{{$restaurant->slug}}">{{$restaurant->name}}</a></h1>
                        </div>
                    </div>

                @endforeach

            </div>

            <div class="my-5">
                {{ $restaurants->links() }}
            </div>
        </div>
    </section>

@endsection
