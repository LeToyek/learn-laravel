@extends('layouts.index')
@section('container')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold">Hold Events Easily With Festiwise</h1>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="mb-5" style="color: darkgrey">Start Bootstrap can help you build better websites using the
                        Bootstrap
                        framework! Just download a theme and start customizing, no strings attached!</p>
                    <div class="row justify-content-center">
                        <button class="btn-l col-4">Get Started</button>
                        <div class="col"></div>
                        <button class="btn-r col-4">Find Events</button>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
