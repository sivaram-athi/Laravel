@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ $user->path() }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="form-group row mb-5">
            <label class="col-md-4 col-form-label text-md-right" for="name">Name</label>
            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" autocomplete="name"
                    value="{{ $user->name }}" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mb-5">
            <label class="col-md-4 col-form-label text-md-right" for="username">Userame</label>
            <div class="col-md-6">
                <input id="username" type="text" class="form-control" name="username" autocomplete="username"
                    value="{{ $user->username }}" autofocus>

                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mb-5">
            <label class="col-md-4 col-form-label text-md-right" for="email">Email</label>
            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" autocomplete="email"
                    value="{{ $user->email }}" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mb-5">
            <label class="col-md-4 col-form-label text-md-right" for="avatar">Avatar</label>
            <div class="col-md-6">
                <input id="avatar" type="file" class="form-control" name="avatar" autocomplete="avatar" autofocus>

                @error('avatar')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row mb-5">
            <div class="col"></div>
            <div class="col-md-8">
                <img src="{{ $user->avatar }}" class="ima rounded-circle" alt="Your avatar" style="width: 150px;height:150px;">
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
            <div class="col-md-6">
                <input id="password" type="password" class="form-control " name="password" required
                    autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password">
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
                <a class="text-dark btn  btn-danger font-weight-bold ms-3 don text-decoration-none" href="{{ $user->path() }}">Cancel</a>
            </div>
        </div>

    </form>
@endsection
