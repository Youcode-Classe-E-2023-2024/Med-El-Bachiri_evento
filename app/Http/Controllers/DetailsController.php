<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    public function index(Request $request)
    {
        $event = Event::where('id', $request->event_id)
            ->with(['category:id,name', 'user:id,name,email'])
            ->first();

        if ($event === null) {
            return abort(404);
        }
        $eventStatistics = Event::withCount([
            'ticket as confirmed_reservations' => function ($query) {
                $query->where('reserved', true);
            },
            'ticket as waiting_for_approval' => function ($query) {
                $query->where('reserved', false);
            }
        ])->findOrFail($request->event_id);

        $reservationsPerDay = Event::find($request->event_id)
            ->ticket()
            ->selectRaw('DATE(created_at) as date')
            ->selectRaw('COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return view('pages.details', compact('event', 'eventStatistics', 'reservationsPerDay'));
    }
}
