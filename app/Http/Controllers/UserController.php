<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

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
            'email' => ['required', 'email', 'unique:users,email,'. $user->id],
            'picture' => ['nullable', 'file', 'mimes:png,jpg,jpeg', 'max:400'],
            'password' => ['nullable', 'string', 'confirmed'],
        ]);

        $picture = $user->picture;

        if (!empty($request->hasFile('picture'))) {
            $image = $request->file('picture');

            \Storage::disk('public')->delete($picture);
            $picture = \Storage::disk('public')->put("profile-pics", $image);

            $picture = "/storage/{$picture}";
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'picture' => $picture,
            'password' => Hash::make($request->password),
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

    /**
     * Find friends page.
     */
    public function findFriends()
    {
        $users = User::select(['id', 'name', 'picture'])
            ->whereNotIn('id', auth()->user()->friends->pluck('id')->toArray())
            ->get()
            ->toArray();

        return view('users.find-friends')
            ->with('users', $users);
    }

    /**
     * Add a user as friend.
     * @param User $user
     * @return
     */
    public function addFriend(User $user)
    {
        $authUser = auth()->user();

        // Add friend to the user.
        if (!$authUser->friends()->where('id', $user->id)->exists())
            $authUser->friends()->attach($user->id);

        return redirect()->back();
    }

}
