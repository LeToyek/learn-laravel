@extends('layouts.main')
@section('container')
    @foreach ($author->posts as $post)
        <article class="mb-5 border-bottom pb-3">
            <h2>{{ $post->title }}</h2>
            {{ $post->body }}
        </article>
    @endforeach
@endsection
