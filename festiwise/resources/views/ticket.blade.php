@extends('layouts.index')

@section('container')
    @include('ticket.index', ['event' => $ticket->event])
    <div class="wrapper" style="display: flex;justify-content: center">
        <div style="width: 400px">
            <a href="../events" class="btn btn-primary">Back to Events</a >
        </div>
    </div>
@endsection
