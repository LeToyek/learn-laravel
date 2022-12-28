@extends('layouts.main')

@section('container')
    @foreach ($posts as $post)
        <article class="mb-5">
            <a href="post/{{ $post->slug }}">
                <h2>{{ $post->title }}</h2>
            </a>
            {{ $post->excerpt }}
        </article>
    @endforeach
@endsection
