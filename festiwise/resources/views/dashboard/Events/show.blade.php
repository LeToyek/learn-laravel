@extends('dashboard.layouts.index')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <img class="img-fluid card-img-top" src="{{ asset('storage/' . $event->image) }}" class="img-fluid"
                        alt="yee">
                    <div class="card-body">
                        <div class="d-flex" style="align-items: center">
                            <h5 class="card-title" style="flex: 11">{{ $event->title }}</h5>
                        </div>
                        
                        <h6 class="card-stock col">Stock: {{ $event->stock }}</h6>
                        <div class="progress col">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                style="width: {{ ($event->stock / $event->max_ticket) * 100 }}%"></div>
                        </div>
                        <h6 class="card-text"><span data-feather="map-pin" style="width: 16px"></span>
                            {{ $event->location }}</h6>
                        <h6 class="card-text"><span data-feather="dollar-sign" style="width: 16px"></span>
                            {{ $event->price }}</h6>
                        <h6 class="card-text"><span data-feather="clock" style="width: 16px"></span>
                            {{ $event->event_date }}</h6>
                        <p class="card-text">{{ $event->excerpt }}</p>
                        <a href="../events" class="btn btn-success"><span data-feather="arrow-left-circle"></span> Back to
                            events</a>
                        <a href="../events/{{ $event->slug }}/edit" class="btn btn-warning"><span
                                data-feather="edit"></span> Edit</a>
                        <form class="d-inline" action="/dashboard/events/{{ $event->slug }}" method="POST">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger border-0" onclick="return confirm('Are you sure?')">
                                <span data-feather="x-circle">
                                </span>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
