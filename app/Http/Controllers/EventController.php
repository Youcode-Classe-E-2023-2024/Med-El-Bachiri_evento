<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function create(Request $request){
        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'city_name' => $request->city_name,
            'price' => $request->price,
            'places_available' => $request->places_available,
            'date' => $request->date,
            'category_id' => $request->category_id,
            'acceptation_method' => $request->acceptation_method,
            'validated' => false,
            'user_id' => Auth::user()->id,
        ]);
        return back()->with('success', 'Event created successfully, wait for Admin validation ');
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
}
