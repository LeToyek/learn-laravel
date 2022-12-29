@extends('layouts.main')

@section('container')
    @foreach ($posts as $post)
        <article class="mb-5">
            <a href="post/{{ $post->slug }}">
                <h2>{{ $post->title }}</h2>
            </a>
            <h5>by Maulana in <a href="/categories/{{$post->category->slug }}">{{ $post->category->name }}</a></h5>
            {{ $post->excerpt }}
        </article>
    @endforeach
@endsection
