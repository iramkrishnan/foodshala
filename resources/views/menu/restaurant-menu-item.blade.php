@extends('layouts.base')

@section('content')

    <section class="text-gray-700 body-font overflow-hidden">
        <div class="container px-5 py-12 mx-auto">
            <div class="lg:w-4/5 mx-auto flex flex-wrap">
                <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded"
                     src="{{$restaurantMenuItem->image}}" style="object-fit: contain">
                <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                    <h2 class="text-sm title-font text-gray-500 tracking-widest text-uppercase">{{$restaurantMenuItem->restaurant->name}}</h2>
                    <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{$restaurantMenuItem->menuItem->menu_item}}</h1>
                    <div class="flex mb-4">
                        <span class="flex items-center">
                            @for($star = 0; $star < random_int(3, 5); $star++)
                                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                                        <path
                                            d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                </svg>
                            @endfor
                        </span>

                    </div>

                    @if($restaurantMenuItem->type == 'vegetarian')
                        <p style="color: green">{{$restaurantMenuItem->type}}</p>
                    @else
                        <p style="color: red">{{$restaurantMenuItem->type}}</p>

                    @endif


                    <br>
                    @if ($restaurantMenuItem->description !== null)
                        <p class="leading-relaxed">{{$restaurantMenuItem->description}}</p>
                    @endif


                    <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5">

                    </div>

                    <div class="flex">
                        <span
                            class="title-font font-medium text-2xl text-gray-900">&#8377; {{$restaurantMenuItem->price}}</span>

                        <form action="{{route('post.customer.cart')}}" method="POST">
                            @csrf
                            <input type="hidden" name="restaurant_menu_item_id" value="{{$restaurantMenuItem->id}}">

                            <div class="flex ml-6 items-center">
                                <span class="mr-3">Quantity</span>
                                <div class="relative">
                                    <select name="quantity" id="quantity"
                                        class="rounded border appearance-none border-gray-400 py-2 focus:outline-none focus:border-indigo-500 text-base pl-3 pr-10">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    <span
                                        class="absolute right-0 top-0 h-full w-10 text-center text-gray-600 pointer-events-none flex items-center justify-center">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                             stroke-linejoin="round" stroke-width="2"
                                             class="w-4 h-4" viewBox="0 0 24 24">
                                          <path d="M6 9l6 6 6-6"></path>
                                        </svg>
                                    </span>
                                    <a class="ml-5">Add to cart</a>
                                    <button type="submit"
                                        class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-2 mb-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24">
                                            <path
                                                d="M10 19.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5zm3.5-1.5c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm1.336-5l1.977-7h-16.813l2.938 7h11.898zm4.969-10l-3.432 12h-12.597l.839 2h13.239l3.474-12h1.929l.743-2h-4.195z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="text-gray-700 body-font">
        <div class="container px-5 mx-auto">
            <div class="flex flex-wrap w-full mb-2 flex-col items-center text-center">
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">
                    Served to you by</h1>
            </div>
        </div>
    </section>

    <div id="app" class="bg-blue-100 max-w-sm bg-white shadow-lg rounded-lg overflow-hidden mx-auto">
        <restaurant-info></restaurant-info>
    </div>

    <script type="text/x-template" id="restaurant-info-template">
        <a href="/{{$restaurantMenuItem->restaurant->slug}}">

        <div>
            <img class="w-full h-56 object-cover object-center" src="{{$restaurantMenuItem->restaurant->image}}" alt="">
            <div class="flex items-center px-6 py-3 bg-gray-900">
                <h1 class="mx-3 text-white font-semibold text-lg"> {{$restaurantMenuItem->restaurant->name}}</h1>
            </div>
            <div class="py-4 px-6">
                <h1 class="text-2xl font-semibold text-gray-800"></h1>

                @if($restaurantMenuItem->restaurant->cuisine == 'vegetarian')
                    Cuisine:  <span style="color: green" class="py-2 text-lg text-gray-900">{{$restaurantMenuItem->restaurant->cuisine}}</span>
                @else
                    Cuisine:  <span style="color: red" class="py-2 text-lg text-gray-900">{{$restaurantMenuItem->restaurant->cuisine}}</span>

                @endif

                <div class="flex items-center mt-4 text-gray-700">
                    <svg class="h-6 w-6 fill-current" viewBox="0 0 20 20">
                        <path d="M15.573,11.624c0.568-0.478,0.947-1.219,0.947-2.019c0-1.37-1.108-2.569-2.371-2.569s-2.371,1.2-2.371,2.569c0,0.8,0.379,1.542,0.946,2.019c-0.253,0.089-0.496,0.2-0.728,0.332c-0.743-0.898-1.745-1.573-2.891-1.911c0.877-0.61,1.486-1.666,1.486-2.812c0-1.79-1.479-3.359-3.162-3.359S4.269,5.443,4.269,7.233c0,1.146,0.608,2.202,1.486,2.812c-2.454,0.725-4.252,2.998-4.252,5.685c0,0.218,0.178,0.396,0.395,0.396h16.203c0.218,0,0.396-0.178,0.396-0.396C18.497,13.831,17.273,12.216,15.573,11.624 M12.568,9.605c0-0.822,0.689-1.779,1.581-1.779s1.58,0.957,1.58,1.779s-0.688,1.779-1.58,1.779S12.568,10.427,12.568,9.605 M5.06,7.233c0-1.213,1.014-2.569,2.371-2.569c1.358,0,2.371,1.355,2.371,2.569S8.789,9.802,7.431,9.802C6.073,9.802,5.06,8.447,5.06,7.233 M2.309,15.335c0.202-2.649,2.423-4.742,5.122-4.742s4.921,2.093,5.122,4.742H2.309z M13.346,15.335c-0.067-0.997-0.382-1.928-0.882-2.732c0.502-0.271,1.075-0.429,1.686-0.429c1.828,0,3.338,1.385,3.535,3.161H13.346z"></path>                </svg>
                    <h1 class="px-2 text-sm">Phone: {{$restaurantMenuItem->restaurant->phone}}</h1>
                </div>
                <div class="flex items-center mt-4 text-gray-700">
                    <svg class="h-6 w-6 fill-current" viewBox="0 0 20 20">
                        <path d="M10,1.375c-3.17,0-5.75,2.548-5.75,5.682c0,6.685,5.259,11.276,5.483,11.469c0.152,0.132,0.382,0.132,0.534,0c0.224-0.193,5.481-4.784,5.483-11.469C15.75,3.923,13.171,1.375,10,1.375 M10,17.653c-1.064-1.024-4.929-5.127-4.929-10.596c0-2.68,2.212-4.861,4.929-4.861s4.929,2.181,4.929,4.861C14.927,12.518,11.063,16.627,10,17.653 M10,3.839c-1.815,0-3.286,1.47-3.286,3.286s1.47,3.286,3.286,3.286s3.286-1.47,3.286-3.286S11.815,3.839,10,3.839 M10,9.589c-1.359,0-2.464-1.105-2.464-2.464S8.641,4.661,10,4.661s2.464,1.105,2.464,2.464S11.359,9.589,10,9.589"></path>                </svg>
                    <h1 class="px-2 text-sm"> Address: {{$restaurantMenuItem->restaurant->address}}  </h1>
                </div>
                <div class="flex items-center mt-4 text-gray-700">
                    <svg class="h-6 w-6 fill-current" viewBox="0 0 20 20">
                        <path d="M16.469,8.924l-2.414,2.413c-0.156,0.156-0.408,0.156-0.564,0c-0.156-0.155-0.156-0.408,0-0.563l2.414-2.414c1.175-1.175,1.175-3.087,0-4.262c-0.57-0.569-1.326-0.883-2.132-0.883s-1.562,0.313-2.132,0.883L9.227,6.511c-1.175,1.175-1.175,3.087,0,4.263c0.288,0.288,0.624,0.511,0.997,0.662c0.204,0.083,0.303,0.315,0.22,0.52c-0.171,0.422-0.643,0.17-0.52,0.22c-0.473-0.191-0.898-0.474-1.262-0.838c-1.487-1.485-1.487-3.904,0-5.391l2.414-2.413c0.72-0.72,1.678-1.117,2.696-1.117s1.976,0.396,2.696,1.117C17.955,5.02,17.955,7.438,16.469,8.924 M10.076,7.825c-0.205-0.083-0.437,0.016-0.52,0.22c-0.083,0.205,0.016,0.437,0.22,0.52c0.374,0.151,0.709,0.374,0.997,0.662c1.176,1.176,1.176,3.088,0,4.263l-2.414,2.413c-0.569,0.569-1.326,0.883-2.131,0.883s-1.562-0.313-2.132-0.883c-1.175-1.175-1.175-3.087,0-4.262L6.51,9.227c0.156-0.155,0.156-0.408,0-0.564c-0.156-0.156-0.408-0.156-0.564,0l-2.414,2.414c-1.487,1.485-1.487,3.904,0,5.391c0.72,0.72,1.678,1.116,2.696,1.116s1.976-0.396,2.696-1.116l2.414-2.413c1.487-1.486,1.487-3.905,0-5.392C10.974,8.298,10.55,8.017,10.076,7.825"></path>
                    </svg>
                    <h1 class="px-2 text-sm">Email ID: {{$restaurantMenuItem->restaurant->email}}</h1>
                </div>
            </div>
        </div>
        </a>

    </script>

    <!-- Import Vue.js and axios -->
    <script src="https://unpkg.com/vue"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <!-- Your JavaScript Code :) -->
    <script>
        Vue.component('restaurant-info', {
            template: '#restaurant-info-template',
            props: {
                username: {
                    type: String,
                    required: true
                }
            },
            data () {
                return {
                    user: {}
                }
            },
        })
        new Vue({
            el: '#app'
        })
    </script>

@endsection
