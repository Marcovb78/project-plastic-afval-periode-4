<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        activity()->causedBy(auth()->user())
            ->performedOn(User::find(1))
            ->log("<span class='wcd-blue'>Robin</span> heeft de achievement <span class='wcd-pink'>&nbsp; Niet vriendloos</span> behaald.");

        activity()->causedBy(auth()->user())
            ->performedOn(User::find(1))
            ->log("<span class='wcd-blue'>Marco</span> heeft de achievement <span class='wcd-pink'>Niet vriendloos</span> behaald.");

        activity()->causedBy(auth()->user())
            ->performedOn(User::find(1))
            ->log("<span class='wcd-blue'>Max</span> heeft de achievement <span class='wcd-pink'>&nbsp;&nbsp;&nbsp; Niet vriendloos</span> behaald.");
    }
}
