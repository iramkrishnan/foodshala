@extends('layouts.base')

@section('content')

    <style>
        .modal {
            transition: opacity 0.25s ease;
        }

        body.modal-active {
            overflow-x: hidden;
            overflow-y: visible !important;
        }
    </style>


    <section class="text-gray-700 body-font">
        <div class="container px-5 pt-12 mx-auto">
            <div class="flex flex-wrap w-full mb-5 flex-col items-center text-center">
                <h1 class="sm:text-3xl text-3xl font-medium title-font mb-2 text-gray-900">
                    Your Cart</h1>
                @if($totalAmount != 0)
                    <h1 class="sm:text-3xl text-3xl font-medium title-font mb-2 text-gray-900">
                        Total Price: &#8377; {{$totalAmount}}</h1>
                @endif
            </div>
        </div>
    </section>
    @if($totalAmount != 0)
    <section class="text-gray-700 body-font overflow-hidden">
        <div class="container px-5 pb-24 mx-auto">
            <div class="flex flex-wrap -m-4">

                <div class="p-4 w-full">
                    <div class="h-full p-6 rounded-lg border-2 border-gray-300 flex flex-col relative overflow-hidden">
                        <div class="flex flex-wrap -m-4">

                            @foreach($cartItems as $cartItem)

                                <div class="p-4 xl:w-1/4 md:w-1/2 w-full">
                                    <div
                                        class="h-full p-6 rounded-lg border-2 border-gray-300 flex flex-col relative overflow-hidden">

                                        <img src="{{$cartItem->restaurantMenuItem->image}}" alt=""
                                             class="img-thumbnail mb-2 rounded-lg">

                                        <h2 class="text-xl tracking-widest title-font mb-1 font-medium uppercase">
                                            <strong>
                                                <a href="/{{$cartItem->restaurantMenuItem->menuItem->slug}}/{{$cartItem->restaurantMenuItem->restaurant->slug}}/{{$cartItem->restaurantMenuItem->id}}"
                                                   class="text-uppercase"> {{$cartItem->restaurantMenuItem->menuItem->menu_item}}  </a></strong>
                                        </h2>

                                        <h2 class="text-3xl text-gray-900 leading-none flex items-center pb-4 mb-4 border-b border-gray-200">
                                            <span>&#8377; {{$cartItem->restaurantMenuItem->price}} per piece</span>
                                        </h2>

                                        <p class="flex items-center mb-2">
                                            <span
                                                class="w-4 h-4 mr-2 inline-flex items-center justify-center text-white rounded-full flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24"><path
                                                    d="M13.025 1l-2.847 2.828 6.176 6.176h-16.354v3.992h16.354l-6.176 6.176 2.847 2.828 10.975-11z"/></svg>
                                            </span>
                                            <a href="/{{$cartItem->restaurantMenuItem->restaurant->slug}}">

                                                from {{$cartItem->restaurantMenuItem->restaurant->name}}
                                            </a>

                                        </p>
                                        <p class="flex items-center mb-2">
                                            <span
                                                class="w-4 h-4 mr-2 inline-flex items-center justify-center text-white rounded-full flex-shrink-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24"><path
                                                        d="M13.025 1l-2.847 2.828 6.176 6.176h-16.354v3.992h16.354l-6.176 6.176 2.847 2.828 10.975-11z"/></svg>
                                            </span>
                                            @if($cartItem->restaurantMenuItem->type == 'non-vegetarian')
                                                <span style="color: red">{{$cartItem->restaurantMenuItem->type}}</span>
                                                <br>
                                            @else
                                                <span
                                                    style="color: green">{{$cartItem->restaurantMenuItem->type}}</span>
                                                <br>
                                            @endif
                                        </p>

                                        <p class="flex items-center mb-2">
                                            <span
                                                class="w-4 h-4 mr-2 inline-flex items-center justify-center text-white rounded-full flex-shrink-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24"><path
                                                        d="M13.025 1l-2.847 2.828 6.176 6.176h-16.354v3.992h16.354l-6.176 6.176 2.847 2.828 10.975-11z"/></svg>
                                            </span>
                                            Quantity: {{$cartItem->quantity}}
                                        </p>

                                    </div>
                                </div>

                            @endforeach

                        </div>
                        <button
                            class="modal-open bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold my-5 py-3 px-4 rounded-full">
                            Checkout
                        </button>
                    </div>
                </div>


            </div>

        </div>
    </section>
    @else
        <section class="text-gray-700 body-font">
            <div class="container px-5 pt-12 mx-auto">
                <div class="flex flex-wrap w-full mb-5 flex-col items-center text-center">
                    <h1 class="sm:text-3xl text-3xl font-medium title-font mb-2 text-gray-900">
                        Empty cart == Empty stomach
                        <br>
                        Order something tasty <a href="{{route('get.menu.list')}}" style="text-decoration: underline">here</a>
                    </h1>
                </div>
            </div>
        </section>

    @endif


    <!--Checkout Modal-->
    <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

            <div
                class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
                <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                     viewBox="0 0 18 18">
                    <path
                        d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                </svg>
                <span class="text-sm">(Esc)</span>
            </div>

            <!-- Add margin if you want to see some of the overlay behind the modal-->
            <div class="modal-content py-4 text-left px-6">
                <!--Title-->
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold">Checkout</p>
                    <div class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                             viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                        </svg>
                    </div>
                </div>

                <!--Body-->
                <p>Your total amount is <strong> &#8377; {{$totalAmount}}. </strong> </p>
                <p>Shall we confirm your order?</p>


                <!--Footer-->
                <div class="flex justify-end pt-2">
                    <button
                        class="px-4 modal-close bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">
                        Back
                    </button>

                    <form action="{{route('post.customer.order')}}" method="POST">
                        @csrf
                            <button class="px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Confirm Order
                            </button>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <script>
        var openmodal = document.querySelectorAll('.modal-open')
        for (var i = 0; i < openmodal.length; i++) {
            openmodal[i].addEventListener('click', function (event) {
                event.preventDefault()
                toggleModal()
            })
        }

        const overlay = document.querySelector('.modal-overlay')
        overlay.addEventListener('click', toggleModal)

        var closemodal = document.querySelectorAll('.modal-close')
        for (var i = 0; i < closemodal.length; i++) {
            closemodal[i].addEventListener('click', toggleModal)
        }

        document.onkeydown = function (evt) {
            evt = evt || window.event
            var isEscape = false
            if ("key" in evt) {
                isEscape = (evt.key === "Escape" || evt.key === "Esc")
            } else {
                isEscape = (evt.keyCode === 27)
            }
            if (isEscape && document.body.classList.contains('modal-active')) {
                toggleModal()
            }
        };

        function toggleModal() {
            const body = document.querySelector('body')
            const modal = document.querySelector('.modal')
            modal.classList.toggle('opacity-0')
            modal.classList.toggle('pointer-events-none')
            body.classList.toggle('modal-active')
        }
    </script>

@endsection
