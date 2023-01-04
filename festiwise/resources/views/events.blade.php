@extends('layouts.index')

@section('container')

    <div class="container">
        <div class="row">
            @foreach ($events as $event)
                <div class="col-md-4 mb-3">
                    <div class="card" style="">
                        <img class="img-fluid card-img-top" src="https://source.unsplash.com/1200x600/?{{ $event->category->name }}" class="img-fluid" alt="yee">
                        <div class="card-body">
                            
                            <h5 class="card-title">{{ $event->title }}</h5>
                            <p class="card-text">{{ $event->excerpt }}</p>
                            <a href="/events/{{ $event->slug }}" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
@endsection
