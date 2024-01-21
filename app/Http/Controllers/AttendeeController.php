<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendee;
use App\Models\Event;
use Illuminate\Validation\Rule;

class AttendeeController extends Controller
{
    public function create()
    {
        return view('attendees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('attendees')->where(function ($query) use ($eventId) {
                    return $query->where('event_id', $eventId);
                }),
            ],
            // Add other validation rules as needed
        ]);

        $attendee = Attendee::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('attendees.create')
            ->with('success', 'Attendee added successfully!');
    }

    public function showAttendees($eventId, $attendeeId)
    {
        $event = Event::findOrFail($eventId);
        $attendees = $event->attendees;
        $attendee = Attendee::findOrFail($attendeeId);
    
        return view('events.show-attendees', compact('event', 'attendees', 'attendee'));
    }

    public function storeEvent(Request $request, $eventId)
    {
            $eventId = $request->input('event_id');
    
            $event = Event::findOrFail($eventId);
    
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:attendees,email,NULL,id,event_id,' . $event->id,
            ]);
    
            $attendee = new Attendee([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
            ]);
    
            $event->attendees()->save($attendee);
    
            return redirect()->route('events.show-attendees', $event->id)
                ->with('success', 'Attendee registered successfully!');
    }

    public function destroy($eventId, $attendeeId)
    {
        $event = Event::findOrFail($eventId);
        $attendee = Attendee::findOrFail($attendeeId);

        $attendee->delete();

        return redirect()->route('events.show-attendees', $event->id)->with('success', 'Attendee deleted successfully!');
    }

    public function edit($eventId, $attendeeId)
    {
        $event = Event::findOrFail($eventId);
        $attendee = Attendee::findOrFail($attendeeId);

        return view('attendees.edit', compact('event', 'attendee'));
    }

    public function update(Request $request, $eventId, $attendeeId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
            ],
        ]);

        $event = Event::findOrFail($eventId);
        $attendee = Attendee::findOrFail($attendeeId);

        $attendee->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('events.show-attendees', $event->id)
            ->with('success', 'Attendee updated successfully!');
    }
}
