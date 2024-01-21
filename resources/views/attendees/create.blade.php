@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Add Attendee</h2>

    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    
        <form method="post" action="{{ route('attendees.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Attendee Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Attendee Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Attendee</button>
        </form>
    </div>
@endsection