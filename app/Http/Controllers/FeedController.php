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
        $pinnedArticles = Article::wherePinned()->get();

        $activities = auth()->user()->activities;

        $events = auth()->user()
            ->events()
            ->where('to_date', '<', now())
            ->get();

        return view('feed.index')
            ->With('articles', $pinnedArticles)
            ->with('activities', $activities)
            ->with('events', $events);
    }
}
