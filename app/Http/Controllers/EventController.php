<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        
        $eventAttendeeCounts = [];
        foreach ($events as $event) {
            $eventAttendeeCounts[$event->id] = $event->attendees->count();
        }
        return view('events.index', compact('events', 'eventAttendeeCounts'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'date' => ['required', 'date', 'after_or_equal:today'],
            'location' => 'required|string',
        ], [
            'date.after_or_equal' => 'The date must be today or a future date.',
        ]);

        $event = Event::create($request->all());
        return redirect()->route('events.index')
            ->with('success', 'Event updated successfully!');
    }

    public function showAttendees($eventId)
    {
        $event = Event::findOrFail($eventId);
        $attendees = $event->attendees;

        return view('events.show-attendees', compact('event', 'attendees'));
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('events.index')
            ->with('success', 'Event deleted successfully!');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'name' => 'required|string',
            'date' => ['required', 'date', 'after_or_equal:today'],
            'location' => 'required|string',
        ], [
            'date.after_or_equal' => 'The date must be today or a future date.',
        ]);

        $event->update([
            'name' => $request->input('name'),
            'date' => $request->input('date'),
            'location' => $request->input('location'),
        ]);

        return redirect()->route('events.index')
            ->with('success', 'Event updated successfully!');
    }
}


