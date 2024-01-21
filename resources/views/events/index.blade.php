@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Event Registration</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('events.create') }}" class="btn btn-primary">Create Event</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Event ID</th>
                    <th>Name of the Event</th>
                    <th>Date</th>
                    <th>Location</th>
                    <th>Attendee Count</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td>{{ $event->id }}</td>
                        <td>{{ $event->name }}</td>
                        <td>{{ $event->date }}</td>
                        <td>{{ $event->location }}</td>
                        <td>{{ $eventAttendeeCounts[$event->id] }}</td>
                        <td>
                            <a href="{{ route('events.show-attendees', $event->id) }}" class="btn btn-info">View Attendees</a>
                            <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning">Edit</a>
                            <form method="post" action="{{ route('events.destroy', $event->id) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection