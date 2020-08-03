@extends('layouts.base')

@section('content')

    <section class="text-gray-700 body-font">
        <div class="container px-5 pt-12 mx-auto">
            <div class="flex flex-wrap w-full mb-20 flex-col items-center text-center">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">
                    Browse from our rich menu to find your favourite food</h1>
            </div>
        </div>
    </section>

    <section class="text-gray-700 body-font">
        <div class="container px-5 pb-24 mx-auto">
            <div class="flex flex-wrap -m-4">

                @foreach($menuItems as $menuItem)
                <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                    <a class="block relative h-48 rounded overflow-hidden" href="/menu/{{$menuItem->slug}}">
                        <img alt="" class="object-cover object-center w-full h-full block"
                             src="https://source.unsplash.com/421x261/?food,{{$menuItem->menu_item}}">
                    </a>
                    <div class="mt-4">
                        <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1"><a href="/menu/{{$menuItem->slug}}">Food</a></h3>
                        <h1 class="text-gray-900 title-font text-lg font-medium"><a href="/menu/{{$menuItem->slug}}">{{$menuItem->menu_item}}</a></h1>
                    </div>
                </div>

                @endforeach

            </div>

            <div class="my-5">
                {{ $menuItems->links() }}
            </div>
        </div>
    </section>
@endsection
