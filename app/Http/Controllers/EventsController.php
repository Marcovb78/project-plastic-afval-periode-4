<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Show the google map with all event pins.
     */
    public function showMap()
    {
        $events = Event::all();

        return view('events.map')
            ->with('events', $events);
    }

}
