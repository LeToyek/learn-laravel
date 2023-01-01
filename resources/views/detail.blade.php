@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">


                <h1>{{ $post['title'] }}</h1>
                <p>by {{ $post->author->name }} in <a
                        href="../posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></p>
                <img src="https://source.unsplash.com/1200x400/?{{ $post->category->name }}" alt="{{ $post->category->name }}"
                    class="img-fluid ">
                <article class="my-3 fs-5">
                    {!! $post->body !!}
                    <a href="/posts" class="text-decoration-none btn btn-primary">Back to Posts</a>
                </article>
            </div>
        </div>
    </div>
@endsection
