@extends('layouts.index')

@section('container')
    @include('ticket.index',['event'=>$ticket->event])
@endsection