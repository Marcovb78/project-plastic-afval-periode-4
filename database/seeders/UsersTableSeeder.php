<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Jord Kuijer',
            'email' => 'jordkuijer@gmail.com',
            'picture' => 'https://cdn.discordapp.com/attachments/373527590721552404/987732408780607598/Ecocode-Jord-pic.jpg',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Wouter Hielema',
            'email' => 'wouterhielema@gmail.com',
            'picture' => 'https://cdn.discordapp.com/attachments/373527590721552404/987732870363746385/Ecocode-Wutter-pic.jpg',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Max Eldering',
            'email' => 'maxeldering@gmail.com',
            'picture' => 'https://cdn.discordapp.com/attachments/373527590721552404/987732869751373846/Ecocode-Max-pic.jpg',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Marco van der Bijl',
            'email' => 'marcovanderbijl@gmail.com',
            'picture' => 'https://cdn.discordapp.com/attachments/373527590721552404/987732870061776996/Ecocode-Marco-pic.jpg',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
    }
}
