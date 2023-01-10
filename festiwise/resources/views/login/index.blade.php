@extends('layouts.index')

@section('container')
    <div class="container col-md-4 my-auto">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session()->has('login_error'))
            <div class="alert alert-danger" role="alert">
                {{ session('login_error') }}
            </div>
        @endif
        <form action="/login" class="my-auto" method="POST">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Please Log in</h1>
            <div class="form-floating ">
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
              id="floatingInput" placeholder="name@example.com" value="{{ old('email') }}">
                <label for="email">Email address</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating my-3">
                <input required type="password" name="password" value="{{ old('password') }}"
                    class="form-control  @error('password') is-invalid @enderror" id="password" placeholder="Password">
                <label for="password">Password</label>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Log in</button>
            <small class="d-block text-center mt-3">Not registered? <a href="/register">Register now!</a></small>
        </form>
    </div>
@endsection
