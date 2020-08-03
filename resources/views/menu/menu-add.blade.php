@extends('layouts.base')

@section('content')

    <section class="text-gray-700 body-font">
        <form method="POST" action="{{ route('post.menu.add') }}" enctype="multipart/form-data">
            @csrf

            <div class="container px-5 py-10 mx-auto flex flex-wrap items-center">

                <div class="lg:w-2/6 md:w-1/2 bg-gray-200 rounded-lg p-8 flex flex-col md:mx-auto w-full mt-10 md:mt-0">
                    <h1 class="text-gray-900 text-lg font-medium title-font mb-5 text-center"><strong>Add Menu Item</strong>
                    </h1>

                    @error('menu_item')
                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                    @enderror
                    <input id="menu_item" type="text"
                           class="bg-white rounded border border-gray-400 focus:outline-none focus:border-blue-500 text-base px-4 py-2 mb-4 @error('menu_item') is-invalid @enderror"
                           name="menu_item" value="{{ old('menu_item') }}" required autocomplete="menu_item" autofocus
                           placeholder="Menu Item">


                    @error('price')
                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                    @enderror
                    <input id="price" type="text"
                           class="bg-white rounded border border-gray-400 focus:outline-none focus:border-blue-500 text-base px-4 py-2 mb-4 @error('price') is-invalid @enderror"
                           name="price" value="{{ old('price') }}" required autocomplete="price" autofocus
                           placeholder="Price">

                    <label for="cuisine" class="mb-1"> <strong>Type</strong></label>
                    @error('type')
                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                    @enderror
                    <select id="type" class=" form-control py-1 @error('type') is-invalid @enderror"
                            name="type" value="{{ old('type') }}" required autocomplete="type" autofocus>
                        <option value="vegetarian">Vegetarian</option>
                        <option value="non-vegetarian">Non-Vegetarian</option>
                    </select>
                    <br>

                    @error('description')
                    <span class="invalid-feedback py-4" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                    @enderror
                    <input id="description" type="text"
                           class="bg-white rounded border border-gray-400 focus:outline-none focus:border-blue-500 text-base px-4 py-2 mb-4 @error('description') is-invalid @enderror"
                           name="description" value="{{ old('description') }}" autocomplete="description" autofocus
                           placeholder="Description">


                    @error('image')
                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                    @enderror
                    <label for="image"
                           class="col-md-4 col-form-label text-md-right"><strong>Image</strong></label>

                    <div class="col-md-6">
                        <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image"
                               name="image">
                    </div>


                    <button
                        class="text-white bg-blue-500 border-0 py-2 my-3 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">
                        Add Menu Item
                    </button>
                </div>
            </div>
        </form>
    </section>

@endsection
