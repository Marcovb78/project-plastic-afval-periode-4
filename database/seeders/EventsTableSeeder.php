<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::create([
            'user_id' => 2,
            'title' => 'Ploggen in <span class="wcd-pink">Het Appelhof</span>',
            'description' => 'Kom ploggen in Het Appelhof. En neem een vuilniszak en loopschoenen mee.',
            'total_spots' => 10,
            'longitude' => '53.3302486',
            'latitude' => '6.5213962',
            'image' => '',
            'from_date' => now()->addDays(1),
            'to_date' => now()->addDays(1)->addHours(2),
        ]);

        Event::create([
            'user_id' => 2,
            'title' => 'Suppen in <span class="wcd-pink">Het Winsumerdiep</span>',
            'description' => 'Lekker suppen in het Winsumerdiep ofzo.',
            'total_spots' => 5,
            'longitude' => '53.334511',
            'latitude' => '6.532379',
            'image' => '',
            'from_date' => now()->addDays(2),
            'to_date' => now()->addDays(2)->addHours(2),
        ]);

        Event::create([
            'user_id' => 1,
            'title' => 'Wandelen in <span class="wcd-pink">Nationaal Park Dwingelderveld</span>',
            'description' => 'Gezellig een wandeling maken in het Nationaal Park Dwingelderveld in Dwingeloo!',
            'total_spots' => 8,
            'longitude' => '52.809144',
            'latitude' => '6.379235',
            'image' => '',
            'from_date' => now()->addDays(3),
            'to_date' => now()->addDays(3)->addHours(2),
        ]);

        Event::create([
            'user_id' => 3,
            'title' => 'Zuipen op <span class="wcd-pink">Studentenvereniging Unitas</span>',
            'description' => 'Kom lekker zuipen op Studentenvereniging Unitas. Neem gerust een vriend/vriendin mee!',
            'total_spots' => 12,
            'longitude' => '53.2162379',
            'latitude' => '6.5386726',
            'image' => '',
            'from_date' => now()->addDays(4),
            'to_date' => now()->addDays(4)->addHours(2),
        ]);

        Event::create([
            'user_id' => 4,
            'title' => 'Voetballen in <span class="wcd-pink">Uithuizen</span>',
            'description' => 'Een balletje trappen op het voetbalveld in Uithuizen.',
            'total_spots' => 4,
            'longitude' => '53.4038876',
            'latitude' => '6.6712087',
            'image' => '',
            'from_date' => now()->addDays(5),
            'to_date' => now()->addDays(5)->addHours(4),
        ]);
    }
}
