@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Create Event</h2>
            @error('date')
                <div style="color:red">{{ $message }}</div>
            @enderror
        <form method="post" action="{{ route('events.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Event Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Event Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Event Location</label>
                <input type="text" class="form-control" id="location" name="location" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Event</button>
        </form>

        <a href="{{ route('events.index') }}" class="btn btn-info mt-3">View Events</a>
    </div>
@endsection