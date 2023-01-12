@extends('dashboard.layouts.index')

@section('container')
    @foreach ($tickets as $ticket)
        <h5>{{ $ticket->event->title }}</h5>
        {{-- @include('ticket.index', ['event' => $ticket->event]) --}}
    @endforeach
@endsection
