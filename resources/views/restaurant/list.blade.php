@extends('layouts.base')

@section('content')

    <section class="text-gray-700 body-font">
        <div class="container px-5 pt-12 mx-auto">
            <div class="flex flex-wrap w-full flex-col items-center text-center">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">
                    Order from the best restaurants in town</h1>
            </div>
        </div>
    </section>

    <!-- Search Bar Starts -->

    <style>
        .show {
            display: block;
        }

        .hide {
            display: none;
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <!-- Search Box -->
    <section class="bg h-50 p-8 flex flex-wrap">
        <div class="container mx-auto flex flex-wrap">
            <input
                class="border-2 border-blue-500 w-3/4 mx-auto h-16 px-3 rounded focus:outline-none focus:shadow-outline lg:text-xl md:text-md px-8 shadow-lg"
                type="text" id="search" name="search" placeholder="Search restaurants">
            <button type="button" class="mx-auto" onclick="myFunction()">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path
                        d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/>
                </svg>
            </button>

        </div>
    </section>

    <div id="results-body">
        <section class="text-gray-700 body-font">
            <div class="container px-5 pb-24 mx-auto">
                <div class="flex flex-wrap -m-4" id="results">

                </div>
            </div>
        </section>
    </div>

    <script type="text/javascript">
        $('#search').on('keyup', function () {

            var element = document.getElementById("results-body");

            if (element.classList.contains('hide')) {
                element.classList.toggle("hide"); // remove hide
            }

            element.classList.toggle("show"); // add show

            // add hide in restaurant body if it doesn't already exist
            if (!document.getElementById('restaurant-body').classList.contains('hide')) {
                document.getElementById("restaurant-body").classList.toggle("hide");
            }

            if (document.getElementById("search").value === '') {
                element.classList.toggle("show"); // remove show
                element.classList.toggle("hide"); // add hide

                document.getElementById("restaurant-body").classList.toggle("hide"); // remove hide
            }

            $value = $(this).val();

            $.ajax({
                type: 'get',
                url: '{{route('get.restaurant.search')}}',
                data: {'search': $value},
                success: function (data) {

                    var row = '';
                    for (var i = 0; i < data.length; i++) {
                        // row += '<li> <a href="/menu/' + data[i]['slug'] + '">' + data[i]['menu_item'] + '</a> </li>'

                        row += '                <div class="lg:w-1/4 md:w-1/2 p-4 w-full">\n' +
                            '                    <a class="block relative h-48 rounded overflow-hidden" href="/' + data[i]['slug'] + ' ">\n' +
                            '                        <img alt="" class="object-cover object-center w-full h-full block"\n' +
                            '                             src="' + data[i]['image'] + ' ">\n' +
                            '                    </a>\n' +
                            '                    <div class="mt-4">\n' +
                            '                        <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1"><a href="/' + data[i]['slug'] + ' ">Restaurant</a></h3>\n' +
                            '                        <h1 class="text-gray-900 title-font text-lg font-medium"><a href="/' + data[i]['slug'] + ' "> ' + data[i]['name'] + '</a></h1>\n' +
                            '                    </div>\n' +
                            '                </div>'
                    }
                    $('#results').html(row);
                }
            });
        })

        function myFunction() {
            var element = document.getElementById("results-body");
            if (element.classList.contains('show')) {
                element.classList.toggle("show"); // remove show
            }
            if (!element.classList.contains('hide')) {
                element.classList.toggle("hide"); // add hide
            }

            if (document.getElementById("restaurant-body").classList.contains("hide")) {
                document.getElementById("restaurant-body").classList.toggle("hide"); // remove hide in restaurant body

            }
            if (!document.getElementById("restaurant-body").classList.contains('show')) {
                document.getElementById("restaurant-body").classList.toggle("show"); // add show in restaurant body
            }

            document.getElementById("search").value = "";
        }

    </script>

    <script type="text/javascript">
        $.ajaxSetup({headers: {'csrftoken': '{{ csrf_token() }}'}});
    </script>


    <!-- Search Bar Ends -->

    <div id="restaurant-body">

        <section class="text-gray-700 body-font">
            <div class="container px-5 pb-24 mx-auto">
                <div class="flex flex-wrap -m-4">

                    @foreach($restaurants as $restaurant)

                        <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                            <a class="block relative h-48 rounded overflow-hidden" href="/{{$restaurant->slug}}">
                                <img alt="" class="object-cover object-center w-full h-full block"
                                     src="{{$restaurant->image}}">
                            </a>
                            <div class="mt-4">
                                <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1"><a
                                        href="/{{$restaurant->slug}}">Restaurant</a></h3>
                                <h1 class="text-gray-900 title-font text-lg font-medium"><a
                                        href="/{{$restaurant->slug}}">{{$restaurant->name}}</a></h1>
                            </div>
                        </div>

                    @endforeach

                </div>

                <div class="my-5">
                    {{ $restaurants->links() }}
                </div>
            </div>
        </section>
    </div>

@endsection
