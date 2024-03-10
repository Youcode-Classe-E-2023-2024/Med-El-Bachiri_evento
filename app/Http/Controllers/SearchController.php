<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function handle(Request $request)
    {
        return Event::where('title', 'like', '%' . $request->event_title . '%')
                    ->with('category')
                    ->get();
    }
}
