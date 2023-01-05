@extends('layouts.index')

@section('container')
    <div class="container">

        <h1>{{ $event->title }}</h1>
        <h3>{{ $event->excerpt }}</h3>
        <h6>{{ $event->price }}</h6>
        <h4>Will be held on {{ $event->event_date }}</h4>
    </div>
@endsection
