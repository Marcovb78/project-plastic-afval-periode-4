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
     * Update profile of the current user.
     * @param Request $request
     */
    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => ['required', 'string'],
            'picture' => ['nullable', 'file', 'mimes:png,jpg,jpeg', 'max:400'],
        ]);

        $picture = $user->picture;

        if ($request->hasFile('picture')) {
            $image = $request->file('picture');

            \Storage::disk('public')->delete($picture);
            $picture = \Storage::disk('public')->put("profile-pics", $image);
        }

        $user->update([
            'name' => $request->name,
            'picture' => $picture,
        ]);

        return redirect()->route('user.profile');
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
