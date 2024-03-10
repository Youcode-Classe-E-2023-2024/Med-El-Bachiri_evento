<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        // statistics
        $categories = Category::withCount(['events' => function ($query) {
            $query->where('validated', true);
            $query->where('deleted', false);
        }])->get();

        $acceptationMethods = Event::where('validated', true)
            ->where('deleted', false)
            ->select('acceptation_method')
            ->selectRaw('count(*) as count')
            ->groupBy('acceptation_method')
            ->get();

        return view('pages.dashboard', compact('events', 'categories', 'acceptationMethods'));
    }
}
