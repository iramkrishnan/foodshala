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

<!-- Navbar for Restaurants -->

@if(\Illuminate\Support\Facades\Auth::guard('restaurant')->check())

    <header class="text-gray-700 body-font">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
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
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
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
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
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
