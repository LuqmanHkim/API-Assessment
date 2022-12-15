@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
       <h1>Edit Event</h1>
     <div>
            @if(session('message'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong> {{ session('message') }}</strong>
                </div>
            @endif

         <form method="post" action="{{ route('events.update', ['event'=> $events->id]) }}">
             @csrf
             @method('PUT')
             <div class="form-group">
                 <label for="first_name">Name</label>
                 <input type="text" class="form-control" name="name" value="{{ $events->name }}"/>
             </div>

             <div class="form-group">
                 <label for="last_name">Start At</label>
                 <input type="date" class="form-control" name="startAt" value="{{ $events->startAt }}"/>
             </div>

             <div class="form-group">
                 <label for="email">End At</label>
                 <input type="date" class="form-control" name="endAt" value="{{ $events->endAt }}"/>
             </div>
             </div>
             <button type="submit" class="btn btn-primary mt-5">Update Event</button>
         </form>
     </div>
   </div>
   </div>
   @endsection
