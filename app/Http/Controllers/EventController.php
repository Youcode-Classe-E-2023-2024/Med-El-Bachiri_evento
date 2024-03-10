<?php

namespace App\Http\Controllers;

use App\Mail\TicketGenerated;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function create(Request $request)
    {
        Event::create($request->all());
        return back()->with('success', 'Event created successfully, wait for Admin validation.');
    }

    public function valid(Request $request)
    {
        $event = Event::where('id', $request->event_id)->first();
        $event->validated = true;
        $event->save();
        return back()->with('success', 'Event validated successfully !!!');
    }

    public function not_valid(Request $request)
    {
        $event = Event::where('id', $request->event_id)->first();
        $event->deleted = true;
        $event->save();
        return back()->with('success', 'Event was deleted successfully !!!');
    }

    public function my_events()
    {
        $events = Event::where('user_id', Auth::user()->id)
            ->where('deleted', false)
            ->where('validated', true)
            ->get();
        return view('pages.my_events', compact('events'));
    }

    public function edit(Request $request)
    {
        $event = Event::where('user_id', Auth::user()->id)
            ->where('id', $request->event_id)
            ->with(['category:id,name', 'user:id,name,email'])
            ->get()
            ->first();
        // if not created by the user
        if ($event === null) {
            return abort(404);
        }
        return view('pages.edit_event', compact('event'));
    }

    public function update(Request $request)
    {
        $event = Event::find($request->event_id);

        if (!$event) {
            return abort(404);
        }

        if ($event->user_id != Auth::user()->id) {
            return abort(404);
        }

        $event->update($request->all());

        return redirect('/my/events')->with('success', 'Event updated successfully.');
    }

}
