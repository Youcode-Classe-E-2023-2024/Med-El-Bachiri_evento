<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function handle(Request $request)
    {
        $events = Event::where('validated', true)
                        ->where('deleted', false)
                        ->where('category_id', $request->category_id)
                        ->get();

        return response()->json([
            'events' => $events
        ]);
    }
}
