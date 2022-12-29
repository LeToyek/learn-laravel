@extends('layouts.main')

@section('container')
    @foreach ($categories as $category)
        <article class="mb-5">
            <a href="categories/{{ $category->slug }}">
                <h2>{{ $category->name }}</h2>
            </a>
        </article>
    @endforeach
@endsection
