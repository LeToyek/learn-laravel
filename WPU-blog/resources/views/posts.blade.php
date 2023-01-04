@extends('layouts.main')

@section('container')
    <h1 class="text-center mb-3">{{ $title }}</h1>
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/posts" method="get">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @elseif (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search.." name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-danger" type="submit">Search</button>
                </div>

            </form>
        </div>
    </div>

    @if ($posts->count())
        <div class="card mb-3">
            <div class="card-body text-center">
                @if ($posts[0]->image != null)
                    <div class="wrapper" style="max-height: 200px;overflow: hidden;">
                        <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="image {{ $posts[0]->name }}" class="img-fluid">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400/?{{ $posts[0]->category->name }}"
                        alt="{{ $posts[0]->category->name }}" class="img-fluid">
                @endif
                <h2 class="card-title">{{ $posts[0]->title }}</h2>
                <p>
                    <small>By.
                        <a class="text-decoration-none"
                            href="../posts?author={{ $posts[0]->author->name }}">{{ $posts[0]->author->name }}</a>
                        in
                        <a class="text-decoration-none" href="/posts?category={{ $posts[0]->category->slug }}">
                            {{ $posts[0]->category->name }}
                        </a>
                        {{ $posts[0]->created_at->diffForHumans() }}
                    </small>
                </p>
                <p class="card-text">{{ $posts[0]->excerpt }}</p>
                <a class="text-decoration-none btn btn-primary" href="../posts/{{ $posts[0]->slug }}">Read more</a>
            </div>
        </div>
    @else
        <p class="text-center fs-4">No post found.</p>
    @endif

    <div class="container">
        <div class="row">
            @foreach ($posts->skip(1) as $post)
                <div class="col-md-4 mb-2">
                    <div class="card mb-3">
                        <a href="../categories/{{ $post->category->name }}">
                            <div class="position-absolute px-3 py-2 text-white"
                                style="background-color: rgba(0, 0, 0, 0.7)">{{ $post->category->name }}</div>
                        </a>
                        @if ($post->image != null)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="image {{ $post->name }}"
                                class="img-fluid mt-3">
                        @else
                            <img src="https://source.unsplash.com/1200x600/?{{ $post->category->name }}"
                                alt="{{ $post->category->name }}" class="img-fluid">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title"> <a class="text-decoration-none" href="../posts/{{ $post->slug }}">
                                    {{ $post->title }}
                                </a></h5>
                            <p class="card-text">
                                <small class="text-muted">By.
                                    <a class="text-decoration-none"
                                        href="../posts?author={{ $post->author->name }}">{{ $post->author->name }}</a>

                                    {{ $post->created_at->diffForHumans() }} in <a
                                        href="/posts?category={{ $post->category->name }}">
                                        {{ $post->category->name }}</a>
                                </small>
                            </p>
                            <p class="card-text">{{ $post->excerpt }}</p>
                            <a href="../posts/{{ $post->slug }}" class="text-decoration-none btn btn-primary">Read
                                more</a>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
@endsection

{{-- <article class="mb-5 border-bottom pb-3">
        <a class="text-decoration-none" href="../posts/{{ $post->slug }}">
            <h2>{{ $post->title }}</h2>
        </a>
        <p>by
            <a class="text-decoration-none" href="../author-posts/{{ $post->author->name }}">{{ $post->author->name }}</a>
            in
            <a class="text-decoration-none" href="/categories/{{ $post->category->slug }}">
                {{ $post->category->name }}
            </a>
        </p>
        <p>
            {{ $post->excerpt }}
        </p>


    </article> --}}
