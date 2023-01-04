@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">


                <h1>{{ $post['title'] }}</h1>
                <p>by {{ $post->author->name }} in 
                    <a href="../posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a>
                </p>
                @if ($post->image != null)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="image {{ $post->name }}" class="img-fluid mt-3">
                @else
                    <img src="https://source.unsplash.com/1200x400/?{{ $post->category->name }}"
                        alt="{{ $post->category->name }}" class="img-fluid mt-3">
                @endif
                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>
                <a href="/posts" class="text-decoration-none btn btn-primary">Back to Posts</a>
            </div>
        </div>
    </div>
@endsection
