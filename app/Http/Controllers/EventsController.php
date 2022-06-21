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
        $events = Event::whereToCome()
            ->whereNotFull()
            ->excludeAuthUser()
            ->get();

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
        $user = auth()->user();

        $request->validate([
            'title' => [ 'required', 'string', 'max:50' ],
            'description' => [ 'required', 'string', 'max:100' ],
            'city' => [ 'required', 'string' ],
            'spots' => [ 'required', 'integer' ],
            'from_date' => [ 'required', 'string' ],
            'to_date' => [ 'required', 'string '],
        ]);

        $user->events()->create([
            'title' => $request->title,
            'description' => $request->description,
            'latitude' => '53.2350634',
            'longitude' => '6.9833811',
            'total_spots' => $request->spots,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
        ]);

        return redirect()->route('feed.show');
    }

    /**
     * Join an event.
     * @param Event $event
     * @return
     */
    public function join(Event $event)
    {
        auth()->user()->events()->attach($event->id);

        return redirect()->route('feed.show');
    }

}
