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
     * Show the map with all event pins.
     * @return
     */
    public function showMap()
    {
        $events = Event::whereToCome()->get();

        return view('events.map')
            ->with('events', $events);
    }

    /**
     * Create a new event.
     * @param Request $request
     * @return
     */
    public function create(Request $request)
    {
        dd($request->all());
    }

    /**
     * Join an event.
     * @param Event $event
     * @return
     */
    public function join(Event $event)
    {
        auth()->user()->events()->attach($event->id);

        // setMessage('success', "Je hebt het evenement {$event->name} gejoint!");

        return redirect()->route('feed.show');
    }

}
