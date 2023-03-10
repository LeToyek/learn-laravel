@extends('dashboard.layouts.index')

@section('container')
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
        <h6><strong>List Events</strong></h6>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="./events/create" class="btn btn-primary me-2">Create new event</a>
            <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle">
                <span data-feather="calendar" class="align-text-bottom"></span>
                This week
            </button>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Title</th>
                <th scope="col">Price</th>
                <th scope="col">Date Held</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->price }}</td>
                    <td>{{ $event->event_date }}</td>
                    <td>
                        <a href="./events/{{ $event->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
                        <a href="../events/{{ $event->slug }}/edit" class="badge bg-warning"><span
                                data-feather="edit"></span></a>
                        <form class="d-inline" action="/dashboard/events/{{ $event->slug }}" method="POST">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">
                                <span data-feather="x-circle">
                                </span>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
