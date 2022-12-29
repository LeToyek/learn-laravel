@extends('layouts.main')
@section('container')
    <h2>{{ $author->name }}</h2>
    <h5>{{ $author->email }}</h5>
@endsection