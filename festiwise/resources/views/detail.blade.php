@extends('layouts.index')

@section('container')
    <div class="container">
        <div class="card" style="">
            @if ($event->image)
                <img class="img-fluid card-img-top" src="{{ asset('storage/' . $event->image) }}" class="img-fluid"
                    alt="yee">
            @else
                <img class="img-fluid card-img-top" src="https://source.unsplash.com/1200x600/?{{ $event->category->name }}"
                    class="img-fluid" alt="yee">
            @endif
            <div class="card-body">
                <div class="d-flex" style="align-items: center">
                    <h5 class="card-title" style="flex: 11">{{ $event->title }}</h5>
                    <h6 class="card-stock bg-success">Stock: {{ $event->stock }}</h6>
                </div>
                <h6 class="card-text"><span data-feather="map-pin" style="width: 16px"></span> {{ $event->location }}</h6>
                <h6 class="card-text"><span data-feather="dollar-sign" style="width: 16px"></span> {{ $event->price }}</h6>
                <h6 class="card-text"><span data-feather="calendar" style="width: 16px"></span>
                    {{ $event->event_date }}</h6>
                <h6 class="card-text"><span data-feather="clock" style="width: 16px"></span>
                    {{ date('g:i a', strtotime($event->start)) }} - {{ date('g:i a', strtotime($event->end)) }}</h6>
                <p class="card-text">{{ $event->excerpt }}</p>
                <form action="./{{ $event->slug }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{ $event->id }}" name="event_id">
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?')">Get Ticket</a>
                </form>
            </div>
        </div>
    </div>
@endsection
