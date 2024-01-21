@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Attendee</h2>
        <form method="post" action="{{ route('attendees.update', [$event->id, $attendee->id]) }}">

            @csrf
            @method('GET')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $attendee->name) }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $attendee->email) }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Attendee</button>
            
        </form>

        <a href="{{ route('events.show-attendees', $event->id) }}" class="btn btn-secondary mt-3">Back to View Attendees</a>
    </div>
@endsection
