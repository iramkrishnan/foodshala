@extends('layouts.base')

@section('content')

    <section class="text-gray-700 body-font">
        <form method="POST" action="{{ route('post.customer.register') }}" enctype="multipart/form-data">
            @csrf

            <div class="container px-5 py-10 mx-auto flex flex-wrap items-center">

                <div class="lg:w-2/6 md:w-1/2 bg-gray-200 rounded-lg p-8 flex flex-col md:mx-auto w-full mt-10 md:mt-0">
                    <h1 class="text-gray-900 text-lg font-medium title-font mb-5"><strong>Customer Register</strong></h1>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <input id="name" type="text"
                           class="bg-white rounded border border-gray-400 focus:outline-none focus:border-blue-500 text-base px-4 py-2 mb-4 @error('name') is-invalid @enderror"
                           name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                           placeholder="Name">


                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <input id="email" type="email"
                           class="bg-white rounded border border-gray-400 focus:outline-none focus:border-blue-500 text-base px-4 py-2 mb-4 @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                           placeholder="Email">


                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <input id="phone" type="text"
                           class="bg-white rounded border border-gray-400 focus:outline-none focus:border-blue-500 text-base px-4 py-2 mb-4 @error('phone') is-invalid @enderror"
                           name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus
                           placeholder="phone">


                    @error('address')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <input id="address" type="text"
                           class="bg-white rounded border border-gray-400 focus:outline-none focus:border-blue-500 text-base px-4 py-2 mb-4 @error('address') is-invalid @enderror"
                           name="address" value="{{ old('address') }}" required autocomplete="address" autofocus
                           placeholder="Address">


                    @error('diet-type')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <select id="diet-type" class=" form-control py-1 @error('diet-type') is-invalid @enderror"
                            name="diet-type" value="{{ old('Diet Type') }}" required autocomplete="diet-type" autofocus>
                        <option value="vegetarian">Pure Vegetarian</option>
                        <option value="non-vegetarian">Non-Vegetarian</option>
                    </select>

                    <br>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <input id="password" type="password"
                           class="bg-white rounded border border-gray-400 focus:outline-none focus:border-blue-500 text-base px-4 py-2 mb-4 @error('password') is-invalid @enderror"
                           name="password" value="{{ old('password') }}" required autocomplete="password" autofocus
                           placeholder="Password">


                    <input id="password-confirm" type="password"
                           class="bg-white rounded border border-gray-400 focus:outline-none focus:border-blue-500 text-base px-4 py-2 mb-4 @error('password') is-invalid @enderror"
                           name="password_confirmation" required autocomplete="new-password"
                           placeholder="Confirm Password">

                    @error('image')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <label for="image"
                           class="col-md-4 col-form-label text-md-right">{{ __(' Add Image') }}</label>

                    <div class="col-md-6">
                        <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image"
                               name="image">
                    </div>


                    <button
                        class="text-white bg-blue-500 border-0 py-2 my-3 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">
                        Register
                    </button>
                </div>
            </div>
        </form>
    </section>

@endsection
