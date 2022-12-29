@extends('layouts.main')
@section('container')
    <h1 class="mb-5">Post Category : {{ $category->name }}</h1>
    @foreach ($posts as $post)
        <article class="mb-5">
            <a href="../post/{{ $post->slug }}">
                <h2>{{ $post->title }}</h2>
            </a>
            {{ $post->excerpt }}
        </article>
    @endforeach
@endsection
