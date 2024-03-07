<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::where('validated', true)
                        ->where('deleted', false)
                        ->get();

        return view('home', compact('events'));
    }
}
