<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $user = auth()->user();

        $validator = Validator::make($request->all(), [
            'title' => [ 'required', 'string', 'max:50' ],
            'description' => [ 'required', 'string', 'max:100' ],
            'city' => [ 'required', 'string' ],
            'spots' => [ 'required', 'integer' ],
            'from_date' => [ 'required', 'string', 'date_format:Y-m-d H:i', 'after_or_equal:today' ],
            'to_date' => [ 'required', 'string', 'date_format:Y-m-d H:i', 'after_or_equal:from_date' ],
        ], [
            'from_date.after_or_equal' => 'De geselecteerde datum moet een datum zijn ná vandaag.',
            'to_date.after_or_equal' => 'De geselecteerde datum moet een datum zijn ná de start datum.'
        ]);

        $cities = json_decode(file_get_contents(public_path('dutch_cities.json')));

        $city = array_filter(
            $cities,
            function ($value) use ($request) {
                $fields = json_decode(json_encode($value->fields), true);

                return strtolower($fields['name']) == strtolower($request->city);
            }
        );

        $validator->after(function ($validator) use ($city) {
            if (empty($city)) {
                $validator->errors()->add(
                    'city', 'Er is geen plaats gevonden met deze naam.'
                );
            }
        });

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $latitude = $city[array_key_first($city)]->fields->coordinates[1];
        $longitude = $city[array_key_first($city)]->fields->coordinates[0];

        $user->events()->create([
            'user_id' => $user->id,
            'title' => $request->title,
            'description' => $request->description,
            'latitude' => $latitude,
            'longitude' => $longitude,
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
