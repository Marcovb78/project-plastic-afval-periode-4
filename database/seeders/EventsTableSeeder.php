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
            'user_id' => 1,
            'title' => 'Appelhof',
            'description' => 'Kom ploggen in Het Appelhof. En neem een vuilniszak en loopschoenen mee.',
            'longitude' => '53.3302486',
            'latitude' => '6.5213962',
            'image' => '',
            'from_date' => now(),
            'to_date' => now()->addHours(2),
        ]);
    }
}
