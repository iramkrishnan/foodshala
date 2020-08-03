@extends('layouts.base')

@section('content')

    <section class="text-gray-700 body-font">
        <div class="container px-5 pt-12 mx-auto">
            <div class="flex flex-wrap w-full mb-20 flex-col items-center text-center">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">
                    Order {{$menuItem->menu_item}} from the following restaurants</h1>
            </div>
        </div>
    </section>

    <section class="text-gray-700 body-font">
        <div class="container px-5 pb-24 mx-auto">
            <div class="flex flex-wrap -m-4">
                @foreach($restaurants as $restaurant)
                    <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                        <a class="block relative h-48 rounded overflow-hidden"
                           href="/{{$restaurant->slug}}/{{$menuItem->slug}}/{{$restaurant->pivot->id}}">
                            <img alt="" class="object-cover w-full h-full block"
                                 src="{{$restaurant->pivot->image}}" style="object-fit: contain">
                        </a>
                        <div class="mt-4">
                            <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">
                                @if($restaurant->pivot->type == 'vegetarian')
                                    <a href="/{{$restaurant->slug}}/{{$menuItem->slug}}/{{$restaurant->pivot->id}}"
                                       style="color: green">{{$restaurant->pivot->type}}</a>
                                @else
                                    <a href="/{{$restaurant->slug}}/{{$menuItem->slug}}/{{$restaurant->pivot->id}}"
                                       style="color: red">{{$restaurant->pivot->type}}</a>
                                @endif

                            </h3>
                            <h1 class="text-gray-900 title-font text-lg font-medium"><a
                                    href="/{{$restaurant->slug}}/{{$menuItem->slug}}/{{$restaurant->pivot->id}}">{{$restaurant->name}}</a>
                            </h1>
                            <p class="mt-1"><strong>&#8377; {{$restaurant->pivot->price}}</strong></p>
                            @if ($restaurant->pivot->description !== null)
                                <p class="mt-1">{{$restaurant->pivot->description}}</p>
                            @endif
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
