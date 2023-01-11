@extends('layouts.index')

@section('container')
    <div class="container">
        <div class="row justify-content-center">
            
            <form action="" class="col-md-6 mb-3">
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control bg-dark" placeholder="Search your events">
                    <button class="input-group-text" id="basic-addon2" type="submit">
                        <span data-feather="search"></span>
                    </button>
                </div>
            </form>
        </div>
        <div class="row">
            @foreach ($events as $event)
                <div class="col-md-4 mb-3">
                    <div class="card" style="">
                        @if ($event->image)
                            <img class="img-fluid card-img-top"
                                src="{{ asset('storage/' . $event->image) }}" class="img-fluid"
                                alt="yee">
                        @else
                            <img class="img-fluid card-img-top"
                                src="https://source.unsplash.com/1200x600/?{{ $event->category->name }}" class="img-fluid"
                                alt="yee">
                        @endif
                        <div class="card-body">
                            <div class="d-flex" style="align-items: center">
                                <h5 class="card-title" style="flex: 11">{{ $event->title }}</h5>
                                <h6 class="card-stock bg-success">Stock: {{ $event->stock }}</h6>
                            </div>
                            <h6 class="card-text"><span data-feather="map-pin" style="width: 16px"></span>
                                {{ $event->location }}</h6>
                            <h6 class="card-text"><span data-feather="dollar-sign" style="width: 16px"></span>
                                {{ $event->price }}</h6>
                            <h6 class="card-text"><span data-feather="clock" style="width: 16px"></span>
                                {{ $event->event_date }}</h6>
                            <p class="card-text">{{ $event->excerpt }}</p>
                            <a href="/events/{{ $event->slug }}" class="btn btn-primary">Get Ticket</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div style="display: flex; justify-content: center; flex-direction: column-reverse">
            {{ $events->links() }}
        </div>
    </div>
@endsection
