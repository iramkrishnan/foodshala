@extends('layouts.restaurant')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Menu Item') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('post.add.menu') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="menu_item" class="col-md-4 col-form-label text-md-right">{{ __('Menu Item') }}</label>

                                <div class="col-md-6">
                                    <input id="menu_item" type="text" class="form-control @error('menu_item') is-invalid @enderror" name="menu_item" value="{{ old('menu_item') }}" required autocomplete="menu_item" autofocus>

                                    @error('menu_item')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add to Menu') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
