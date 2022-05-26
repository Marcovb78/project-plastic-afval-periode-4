<?php

namespace Database\Seeders;

use App\Models\Achievement;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AchievementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Achievement::create([
            'name' => 'Niet vriendloos',
            'description' => 'Maak een vriend.',
        ]);

        Achievement::create([
            'name' => 'Goed begin',
            'description' => 'Join een event.',
        ]);

        Achievement::create([
            'name' => 'Gepiept',
            'description' => 'Voltooi een event.',
        ]);

        Achievement::create([
            'name' => 'Lekker bezig',
            'description' => 'Voltooi 10 events.',
        ]);

        Achievement::create([
            'name' => 'Hard gaan',
            'description' => 'Voltooi 20 events.',
        ]);

        Achievement::create([
            'name' => 'Ondernemer',
            'description' => 'Maak een event aan.',
        ]);

        Achievement::create([
            'name' => '5 KM',
            'description' => 'Loop een route van 5 kilometer.',
        ]);

        Achievement::create([
            'name' => '10 KM',
            'description' => 'Loop een route van 10 kilometer.',
        ]);

        Achievement::create([
            'name' => '20 KM',
            'description' => 'Loop een route van 20 kilometer.',
        ]);

        Achievement::create([
            'name' => 'Aquaman',
            'description' => 'Ga suppen.',
        ]);

        Achievement::create([
            'name' => 'Run Forest',
            'description' => 'Ga ploggen.',
        ]);

        Achievement::create([
            'name' => 'Bge,ing',
            'description' => 'Loop een route die langs een fastfoodketen komt.',
        ]);

        Achievement::create([
            'name' => 'Traveler',
            'description' => 'Loop 3 verschillende routes.',
        ]);
    }
}
