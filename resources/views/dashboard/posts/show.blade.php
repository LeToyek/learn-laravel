@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>{{ $post['title'] }}</h1>
                <a href="../posts" class="btn btn-success"><span data-feather="arrow-left"></span> Back to My Post</a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
                <form class="d-inline" action="/dashboard/posts/{{ $post->slug }}" method="POST">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger border-0" onclick="return confirm('Are you sure?')">
                        <span data-feather="x-circle">
                        </span>
                        Delete
                    </button>
                </form>
                <img src="https://source.unsplash.com/1200x400/?{{ $post->category->name }}"
                    alt="{{ $post->category->name }}" class="img-fluid mt-3">
                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>
            </div>
        </div>
    </div>
@endsection
