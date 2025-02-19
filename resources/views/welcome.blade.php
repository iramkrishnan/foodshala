<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>FoodShala</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .top-left {
                position: absolute;
                left: 10px;
                top: 18px;
            }

            .top-center {
                position: absolute;
                left: 45%;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('get.customer.login') }}">Customer Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('get.customer.register') }}">Customer Register</a>
                        @endif
                    @endauth
                </div>

                <div class="top-left links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('get.restaurant.login') }}">Restaurant Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('get.restaurant.register') }}">Restaurant Register</a>
                        @endif
                    @endauth
                </div>

                <div class="top-center links">
                        <a href="{{ route('get.menu.list') }}">Menu</a>
                        <a href="{{ route('get.restaurant.list') }}">Restaurants</a>
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    FoodShala
                </div>
            </div>
        </div>
    </body>
</html>

