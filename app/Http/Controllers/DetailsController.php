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
        return view('pages.details', ['event' => $event]);
    }
}
