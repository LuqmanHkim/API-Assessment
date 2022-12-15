@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-12">
        @if(session('message'))
            <div class="alert alert-success">
            {{ session('message') }}
            </div>
        @endif
        <h1 class="display-3">Events</h1>
        <div>
          <a href="{{ route('events.create')}}" class="btn btn-primary mb-3">Add Event</a>
        </div>
      <table class="table table-striped">
        <thead>
            <tr>
              <td>No.</td>
              <td>UUID</td>
              <td>Name</td>
              <td>Start At</td>
              <td>End At</td>
              <td colspan = 2>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{$event->id}}</td>
                <td>{{$event->name}}</td>
                <td>{{$event->startAt}}</td>
                <td>{{$event->endAt}}</td>
                <td>
                    <a href="{{ route('events.edit', ['event' => $event->id]) }}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <form action="{{ route('events.destroy', ['event' => $event->id]) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    <div>
    </div>
    @endsection
