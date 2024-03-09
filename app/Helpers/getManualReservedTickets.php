<?php
use \App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

function ticketsNotReserved() {

    return Ticket::where('reserved', false)
                ->where('event_creator_id', Auth::user()->id)
                ->with(['user', 'event'])
                ->get();
};
