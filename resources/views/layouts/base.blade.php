<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="/storage/images/icon.svg "/>

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Tailwind CSS CDN-->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<style>
    body {
        display: flex;
        min-height: 100vh;
        flex-direction: column;
    }

    main {
        flex: 1; /* Or flex-grow: 1;*/
    }

</style>
<body class="flex flex-col min-h-screen">


<div class=" text-center pt-2 lg:px-4">
    <div class="p-2 bg-blue-500 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-1.31 7.526c-.099-.807.528-1.526 1.348-1.526.771 0 1.377.676 1.28 1.451l-.757 6.053c-.035.283-.276.496-.561.496s-.526-.213-.562-.496l-.748-5.978zm1.31 10.724c-.69 0-1.25-.56-1.25-1.25s.56-1.25 1.25-1.25 1.25.56 1.25 1.25-.56 1.25-1.25 1.25z"/></svg>
        <span class=" font-semibold mr-2 text-left flex-auto mx-2">This project is for demonstration purposes only. You can order your favourite food, and then go to the kitchen and cook it for yourself! &#128578; </span>
    </div>
</div>


<!-- Navbar for Restaurants -->

@if(\Illuminate\Support\Facades\Auth::guard('restaurant')->check())

    <header class="text-gray-700 body-font">
        <div class="container mx-auto flex flex-wrap pt-5 flex-col md:flex-row items-center">
            <a href="/" class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                <img src="/storage/images/foodshala.svg" alt="FoodShala" width="300">
            </a>
            <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center">
                <a class="mr-5 hover:text-gray-900" href="{{route('get.menu.list')}}">Menu</a>
                <a class="mr-5 hover:text-gray-900" href="{{route('get.restaurant.list')}}">Restaurants</a>
                <a class="mr-5 hover:text-gray-900" href="{{route('get.menu.add')}}">Add Menu Item</a>
                <a class="mr-5 hover:text-gray-900" href="{{route('get.restaurant.home')}}">Dashboard</a>
            </nav>

            <nav>
                <a class="nav-item dropdown">
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </a>
            </nav>

        </div>
    </header>
@endif

<!-- Navbar for Customers -->


@if(\Illuminate\Support\Facades\Auth::guard('customer')->check())

    <header class="text-gray-700 body-font">
        <div class="container mx-auto flex flex-wrap pt-5 flex-col md:flex-row items-center">
            <a href="/" class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                <img src="/storage/images/foodshala.svg" alt="FoodShala" width="300">
            </a>
            <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center">
                <a class="mr-5 hover:text-gray-900" href="{{route('get.menu.list')}}">Menu</a>
                <a class="mr-5 hover:text-gray-900" href="{{route('get.restaurant.list')}}">Restaurants</a>
                <a class="mr-5 hover:text-gray-900" href="{{route('get.customer.cart')}}">Cart</a>
                <a class="mr-5 hover:text-gray-900" href="{{route('get.customer.home')}}">Dashboard</a>
            </nav>

            <nav>
                <a class="nav-item dropdown">
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </a>
            </nav>

        </div>
    </header>
@endif

<!-- Navbar for Guests -->


@if(!\Illuminate\Support\Facades\Auth::guard('customer')->check() && !\Illuminate\Support\Facades\Auth::guard('restaurant')->check())
    <header class="text-gray-700 body-font">
        <div class="container mx-auto flex flex-wrap pt-5 flex-col md:flex-row items-center">
            <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center">
                <a class="mr-5 hover:text-gray-900" href="{{route('get.restaurant.login')}}">Restaurant Login</a>
                <a class="mr-5 hover:text-gray-900" href="{{route('get.restaurant.register')}}">Restaurant
                    Register</a>

            </nav>
            <a href="/" class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                <img src="/storage/images/foodshala.svg" alt="FoodShala" width="300">
            </a>
            <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center">
                <a class="mr-5 hover:text-gray-900" href="{{route('get.menu.list')}}">Menu</a>
                <a class="mr-5 hover:text-gray-900" href="{{route('get.restaurant.list')}}">Restaurants</a>

                <a class="mr-5 hover:text-gray-900" href="{{route('get.customer.login')}}">Customer Login</a>
                <a class="mr-5 hover:text-gray-900" href="{{route('get.customer.register')}}">Customer Register</a>
            </nav>
        </div>
    </header>
@endif

<main class="flex-grow">
@yield('content')
</main>

<footer class="text-gray-700 body-font mt-5 fixed-bottom">
    <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
        <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900" href="/">
            <img src="/storage/images/foodshala.svg" alt="FoodShala" width="200">
        </a>
        <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">©
            2020
            FoodShala —
            <a href="https://twitter.com/iramkrishnan" class="text-gray-600 ml-1" rel="noopener noreferrer"
               target="_blank">@iramkrishnan</a>
        </p>

        <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4"> Made
            with ❤ in India
        </p>
        <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
      <a class="ml-3 text-gray-500" href="https://linkedin.com/in/ramkrishnan6" target="_blank">
        <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0"
             class="w-5 h-5" viewBox="0 0 24 24">
          <path stroke="none"
                d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
          <circle cx="4" cy="4" r="2" stroke="none"></circle>
        </svg>
      </a>
    </span>
    </div>
</footer>

</body>
