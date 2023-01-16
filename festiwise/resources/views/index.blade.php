@extends('layouts.index')
@section('container')
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold">Hold Events Easily With <span class="title">Festiwise</span></h1>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="mb-5" style="color: darkgrey">Festiwise can help you make your event management easier! Just
                        register and start manage event as much as you want!</p>
                    <div class="row justify-content-center">
                        <button class="btn-l col-md-4" onclick="location.href = './register'">Get Started</button>
                        <div class="col-md-2 my-3"></div>
                        <button class="btn-r col-md-4" onclick="location.href = './events'">Find Events</button>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
