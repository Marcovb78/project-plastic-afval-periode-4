<?php

namespace Database\Seeders;

use App\Models\User;
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
        $users = User::all();

        foreach($this->getData() as $item)
        {
            $achievement = Achievement::create($item);

            $users->each(function ($user) use ($achievement) {
                $user->achievements()->attach($achievement->id);
            });
        }
    }

    private function getData()
    {
        return [
            [
                'name' => 'Niet vriendloos',
                'description' => 'Maak een vriend.',
            ],
            [
                'name' => 'Goed begin',
                'description' => 'Join een event.',
            ],
            [
                'name' => 'Gepiept',
                'description' => 'Voltooi een event.',
            ],
            [
                'name' => 'Lekker bezig',
                'description' => 'Voltooi 10 events.',
            ],
            [
                'name' => 'Hard gaan',
                'description' => 'Voltooi 20 events.',
            ],
            [
                'name' => 'Ondernemer',
                'description' => 'Maak een event aan.',
            ],
            [
                'name' => '5 KM',
                'description' => 'Loop een route van 5 kilometer.',
            ],
            [
                'name' => '10 KM',
                'description' => 'Loop een route van 10 kilometer.',
            ],
            [
                'name' => '20 KM',
                'description' => 'Loop een route van 20 kilometer.',
            ],
            [
                'name' => 'Aquaman',
                'description' => 'Ga suppen.',
            ],
            [
                'name' => 'Run Forest',
                'description' => 'Ga ploggen.',
            ],
            [
                'name' => 'Bge,ing',
                'description' => 'Loop een route die langs een fastfoodketen komt.',
            ],
            [
                'name' => 'Traveler',
                'description' => 'Loop 3 verschillende routes.',
            ],
        ];
    }
}
