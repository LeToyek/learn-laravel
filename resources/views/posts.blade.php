@extends('layouts.main')

@section('container')
    @foreach ($posts as $post)
        <article class="mb-5 border-bottom pb-3">
            <a class="text-decoration-none" href="post/{{ $post->slug }}">
                <h2>{{ $post->title }}</h2>
            </a>
            <h5>by
                <a class="text-decoration-none" href="author-posts/{{ $post->user->name }}">{{ $post->user->name }}</a> in
                <a class="text-decoration-none" href="/categories/{{ $post->category->slug }}">
                    {{ $post->category->name }}
                </a>
            </h5>
            <p>
                {{ $post->excerpt }}
            </p>

            <a class="text-decoration-none" href="post/{{ $post->slug }}">Read more...</a>
        </article>
    @endforeach
@endsection
