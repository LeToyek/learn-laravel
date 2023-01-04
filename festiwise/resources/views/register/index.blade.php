@extends('layouts.index')

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-4">
            <main class="form-signin w-100 m-auto">
                <form action="/register" method="POST">
                    @csrf
                    <h1 class="h3 mb-3 fw-normal text-center">Registration form</h1>
                    <div class="form-floating">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="floatingInput" placeholder="name" value="{{ old('name') }}">
                        <label for="floatingInput">Name</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            id="floatingInput" placeholder="name@example.com" value="{{ old('email') }}">
                        <label for="floatingInput">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                            id="floatingPassword" placeholder="Password" value="{{ old('password') }}">
                        <label for="floatingPassword">Password</label>
                        @error('password')
                            <div class="invalid-feedback mb-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
                </form>
                <small class="d-block text-center mt-3">Already Have account? <a href="/login">Login Here!</a></small>
            </main>
        </div>
    </div>
@endsection
