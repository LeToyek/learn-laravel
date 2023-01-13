@extends('layouts.index')

@section('container')
    @include('ticket.index', ['ticket' => $ticket])
    <div class="wrapper" style="display: flex;justify-content: center">
        <div style="width: 400px;display: flex; justify-content: space-between">
            <a href="../events" class="btn btn-primary"><span style="display: inline" data-feather="arrow-left"></span> Back to Events</a>
            <a href="" class="btn btn-secondary"><i class="fa-light fa-paper-plane-top"></i> Send Email</a>
        </div>
    </div>
@endsection
