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
//        dd($event);
        return view('pages.details', ['event' => $event]);
    }
}
