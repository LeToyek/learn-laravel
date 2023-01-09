@extends('dashboard.layouts.index')

@section('container')
    @foreach ($tickets as $ticket)
        <h1>{{ $ticket->event->title }}</h1>

    @endforeach
@endsection