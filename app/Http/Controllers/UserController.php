<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
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
     * Show the profile page.
     */
    public function showProfile()
    {
        return view('users.profile');
    }

    /**
     * Show profile settings page.
     */
    public function showSettings()
    {
        return view('users.settings');
    }

    /**
     * Show profile achievements page.
     */
    public function showAchievements()
    {
        return view('users.achievements');
    }

}
