<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $events = Event::where('validated', false)
                        ->where('deleted', false)
                        ->with(['category:id,name', 'user:id,name,email'])
                        ->get();
//        dd($events);
        return view('pages.dashboard', compact('events'));
    }
}
