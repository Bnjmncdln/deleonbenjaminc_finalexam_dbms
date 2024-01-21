@extends('layouts.app')

@section('content')
    <div class="container"> 

        <h2>Attendees for {{ $event->name }}</h2>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>Event ID: {{ $event->id }}</th>
                    <th>Date: {{ $event->date }}</th>
                    <th>Location: {{ $event->location }}</th>
                </tr>
            </thead>
        </table>
        

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p style="color: red">{{ $error }}</p>
            @endforeach
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="post" action="{{ route('attendees.store', $event->id) }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Attendee Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Attendee Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            @csrf
            <input type="hidden" name="event_id" value="{{ $event->id }}">
            <button type="submit" class="btn btn-primary">Add Attendee</button>
            
        </form>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Attendee ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($attendees as $attendee)
                    <tr>
                        <td>{{ $attendee->id }}</td>
                        <td>{{ $attendee->name }}</td>
                        <td>{{ $attendee->email }}</td>
                        <td>
                            <a href="{{ route('attendees.edit', [$event->id, $attendee->id]) }}" class="btn btn-warning">Edit Attendee</a>
                            <form method="post" action="{{ route('attendees.destroy', [$event->id, $attendee->id]) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this attendee?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No attendees registered yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <a href="{{ route('events.index') }}" class="btn btn-secondary mt-3">Back to Events</a>
    </div>
@endsection