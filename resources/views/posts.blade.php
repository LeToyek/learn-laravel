@extends('layouts.main')

@section('container')
    @foreach ($posts as $post)
        <article class="mb-5">
            <a href="post/{{ $post['slug'] }}">
                <h2>{{ $post['title'] }}</h2>
            </a>
            <h5>{{ $post['author'] }}</h5>
            <p>{{ $post['body'] }}</p>
        </article>
    @endforeach
@endsection
