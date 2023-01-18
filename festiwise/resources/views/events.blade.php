@extends('layouts.index')

@section('container')
    <div class="container">
        <h1>

        </h1>
        <div class="row justify-content-center mb-3" >
            {{-- <div class="col">
                <button type="button" class="btn btn-primary">Create Event <span class="d-inline" data-feather="plus-square"></span></button>
            </div> --}}
            
            <form action="/events" class="col-md-6">
                @csrf
                <div class="input-group">
                    <input type="text" name="search" class="form-control bg-dark" placeholder="Search your events">
                    <button class="input-group-text" id="basic-addon2" type="submit">
                        <span data-feather="search"></span>
                    </button>
                </div>
            </form>
            {{-- <div class="dropdown col">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Sort By
                </button>
                <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a class="dropdown-item" href="#"></a></li>
                    <li><a class="dropdown-item" href="#">Another </a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div> --}}
        </div>
        @if ($events->count())
            <div class="row">
                @foreach ($events as $event)
                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="card" style="">
                            @if ($event->image)
                                <img class="img-fluid card-img-top" src="{{ asset('storage/' . $event->image) }}"
                                    class="img-fluid" alt="yee">
                            @else
                                <img class="img-fluid card-img-top"
                                    src="https://source.unsplash.com/1200x600/?{{ $event->category->name }}"
                                    class="img-fluid" alt="yee">
                            @endif
                            <div class="card-body">
                                <div class="d-flex " style="justify-content: space-between; align-items: flex-start">
                                    <h5 class="card-title" style="max-width: 60%">{{ $event->title }}</h5>
                                    <h6 class="card-stock bg-success">Stock: {{ $event->stock }}</h6>
                                </div>
                                <h6 class="card-text"><span data-feather="map-pin" style="width: 16px"></span>
                                    {{ $event->location }}</h6>
                                <h6 class="card-text"><span data-feather="dollar-sign" style="width: 16px"></span>
                                    {{ $event->price }}</h6>
                                <h6 class="card-text"><span data-feather="calendar" style="width: 16px"></span>
                                    {{ $event->event_date }}</h6>
                                <h6 class="card-text"><span data-feather="clock" style="width: 16px"></span>
                                    {{ date('g:i a', strtotime($event->start)) }} -
                                    {{ date('g:i a', strtotime($event->end)) }}</h6>
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
        @else
            <h3>Sorry, we can't find your event</h3>
        @endif
    </div>
@endsection
