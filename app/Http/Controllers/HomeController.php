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
                        ->with('category')
                        ->paginate(8);

        return view('home', compact('events'));
    }
}
