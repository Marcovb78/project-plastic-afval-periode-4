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
        activity()->causedBy(User::find(2))
            ->performedOn(User::find(1))
            ->log("<span class='wcd-blue'>Wouter</span> heeft de achievement <span class='wcd-pink'>Niet vriendloos</span> behaald.");

        activity()->causedBy(User::find(4))
            ->performedOn(User::find(1))
            ->log("<span class='wcd-blue'>Marco</span> heeft de achievement <span class='wcd-pink'>Niet vriendloos</span> behaald.");

        activity()->causedBy(User::find(3))
            ->performedOn(User::find(1))
            ->log("<span class='wcd-blue'>Max</span> heeft de achievement <span class='wcd-pink'>Niet vriendloos</span> behaald.");
    }
}
