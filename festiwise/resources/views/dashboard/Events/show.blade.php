@extends('dashboard.layouts.index')

@section('container')
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1>{{ $event->title }}</h1>
          <h5>Rp. {{ $event->price }}</h5>
          <h6 style="font-weight: bold">
            {{ $event->event_date }}
          </h6>
          <p>
            {{ $event->excerpt }}
          </p>
        </div>
      </div>
    </div>
@endsection
