@extends('layouts.index')

@section('container')
    <div class="container">
        <div class="row">

            @foreach ($events as $event)
                <div class="col-md-4 mb-3">
                    <div class="card" >
                        <img src="https://source.unsplash.com/1200x600/?concert" class="img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the
                                card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
@endsection
