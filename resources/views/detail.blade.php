@extends('layouts.main')

@section('container')
    <article>
      <h1>{{ $post['title'] }}</h1>
      <h5>by Maulana in <a href="/categories/{{$post->category->slug }}">{{ $post->category->name }}</a></h5>
      {!! $post->body !!}
    </article>
    <a href="/posts">back</a>
@endsection