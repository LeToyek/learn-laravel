@extends('layouts.main')

@section('container')
    <article>
      <h1>{{ $post['title'] }}</h1>
      <h5>{{ $post['author'] }}</h5>
      <p>{{ $post['body'] }}</p>
    </article>
    <a href="/posts"></a>
@endsection