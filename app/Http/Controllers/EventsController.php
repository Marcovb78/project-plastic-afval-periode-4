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

    /**
     * Join an event.
     *
     */
    public function join(Event $event)
    {
        auth()->user()->events()->attach($event->id);

        // setMessage('success', "Je hebt het evenement {$event->name} gejoint!");

        return redirect()->route('feed.show');
    }

}
