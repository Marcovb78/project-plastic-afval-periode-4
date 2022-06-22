<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Article;
use Illuminate\Http\Request;

class FeedController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        $pinnedArticles = Article::wherePinned()->get();

        $activities = $user->activities;

        $events = Event::whereToCome()
            ->orderBy('from_date', 'ASC')
            ->get();

        $joinedEvents = $user->events()
            ->whereToCome()
            ->orderBy('from_date', 'ASC')
            ->get();

        return view('feed.index')
            ->With('articles', $pinnedArticles)
            ->with('activities', $activities)
            ->with('events', $events)
            ->with('joinedEvents', $joinedEvents);
    }
}
