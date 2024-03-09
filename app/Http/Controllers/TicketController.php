<?php

namespace App\Http\Controllers;

use App\Mail\TicketGenerated;
use App\Models\Event;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class TicketController extends Controller
{
    public function reserve_ticket(Request $request)
    {
        $event = Event::findOrFail($request->event_id);

        if ($event->places_available <= 0) {
            return back()->with('error', 'The event has run out of places!');
        }

        if ($event->deleted) {
            return back()->with('error', 'The event has been deleted!');
        }

        if (!$event->validated) {
            return back()->with('error', 'The event is not validated!');
        }

        $ticket_exist = Ticket::where('user_id', Auth::id())
            ->where('event_id', $request->event_id)
            ->exists();

        if ($ticket_exist) {
            return back()->with('error', 'You have already reserved a ticket for this event!');
        }

        $ticket_code = 'TICKET-' . Str::upper(Str::random(9)) . mt_rand(100, 999);

        $ticket = Ticket::create([
            'event_id' => $event->id,
            'user_id' => Auth::id(),
            'ticket_code' => $ticket_code,
            'reserved' => false,
            'event_creator_id' => User::find($event->user_id)->id
        ]);

        $event->decrement('places_available');

        if ($event->acceptation_method === 'manual') {
            return back()->with('success', 'Your ticket reservation is waiting for approval.');
        } elseif ($event->acceptation_method === 'auto') {
            $ticket->reserved = true;
            $ticket->save();
            Mail::to(Auth::user()->email)->send(new TicketGenerated($ticket, $event));
            return back()->with('success', 'Your ticket was reserved successfully. Check your email!');
        }
    }

    public function approve(Request $request)
    {
        $ticket = Ticket::find($request->ticket_id);
        $ticket->reserved = true;
        $ticket->save();

        Mail::to(User::find($ticket->user_id)->email)->send(new TicketGenerated($ticket, Event::findOrFail($ticket->event_id)));
        return back()->with('success', 'Ticket was approved !!!');
    }

    public function deny(Request $request)
    {
        $ticket = Ticket::find($request->ticket_id);
        $ticket->delete();
        return back()->with('success', 'Ticket was denied and deleted !!!');
    }

}
