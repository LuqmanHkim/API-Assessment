@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
       <h1>Add a event</h1>
     <div>
            @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
         <form method="post" action="{{ route('events.store') }}">
             @csrf
             <div class="form-group">
                 <label for="first_name">Name:</label>
                 <input type="text" class="form-control" name="name"/>
             </div>

             <div class="form-group">
                 <label for="last_name">Start At:</label>
                 <input type="date" class="form-control" name="startAt"/>
             </div>

             <div class="form-group">
                 <label for="email">End At:</label>
                 <input type="date" class="form-control" name="endAt"/>
             </div>
             </div>
             <button type="submit" class="btn btn-primary mt-5">Add Event</button>
         </form>
     </div>
   </div>
   </div>
   @endsection
