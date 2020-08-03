@extends('layouts.base')

@section('content')


    <section class="text-gray-700 body-font">
        <form method="POST" action="{{ route('post.restaurant.login') }}" enctype="multipart/form-data">
            @csrf

            <div class="container px-5 py-10 mx-auto flex flex-wrap items-center">

                <div class="lg:w-2/6 md:w-1/2 bg-gray-200 rounded-lg p-8 flex flex-col md:mx-auto w-full mt-10 md:mt-0">
                    <h1 class="text-gray-900 text-lg font-medium title-font mb-5 text-center"><strong>Restaurant Login</strong>
                    </h1>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                    @enderror
                    <input id="email" type="email"
                           class="bg-white rounded border border-gray-400 focus:outline-none focus:border-blue-500 text-base px-4 py-2 mb-4 @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                           placeholder="Email">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                    @enderror
                    <input id="password" type="password"
                           class="bg-white rounded border border-gray-400 focus:outline-none focus:border-blue-500 text-base px-4 py-2 mb-4 @error('password') is-invalid @enderror"
                           name="password" value="{{ old('password') }}" required autocomplete="password" autofocus
                           placeholder="Password">


                    <button
                        class="text-white bg-blue-500 border-0 py-2 my-3 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">
                        Login
                    </button>
                </div>
            </div>
        </form>
    </section>

@endsection
