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
            'title' => 'Suppen in <span class="wcd-pink">Het Winsumerdiep</span>',
            'description' => 'Lekker suppen in het Winsumerdiep ofzo.',
            'total_spots' => 5,
            'longitude' => '53.334511',
            'latitude' => '6.532379',
            'image' => 'https://waddenland.groningen.nl/uploads/illustraties/fb615be2-06f2-5df0-a11b-4fa0d7ac5e2c/3159220180/Bootje%20Winsumerdiep-%20Groeten%20uit%20Groningen%20Wilco%20van%20der%20Laan.jpg',
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
            'image' => 'https://cdn.quicq.io/travelaar/2020/08/ua-plankenpad-dwingelderveld.jpg',
            'from_date' => now()->addDays(3),
            'to_date' => now()->addDays(3)->addHours(2),
        ]);

        Event::create([
            'user_id' => 3,
            'title' => 'Ploggen op <span class="wcd-pink">Stadsstrand Groningen</span>',
            'description' => 'Kom gezellig ploggen bij het stadsstrand Groningen',
            'total_spots' => 12,
            'longitude' => '53.2162379',
            'latitude' => '6.5386726',
            'image' => 'https://media.insiders.nl/thumbs/detail/800x800/gro/files/image/4b359a1ab5f64d89e3074988a68571d2ea159625.jpeg',
            'from_date' => now()->addDays(4),
            'to_date' => now()->addDays(4)->addHours(2),
        ]);

        Event::create([
            'user_id' => 4,
            'title' => 'Wandelen in <span class="wcd-pink">Uithuizen</span>',
            'description' => 'Wandeling rond het voetbalveld van Uithuizen.',
            'total_spots' => 4,
            'longitude' => '53.4038876',
            'latitude' => '6.6712087',
            'image' => 'http://d3e1m60ptf1oym.cloudfront.net/7aa6603f-bf19-4459-a842-2f7a70643c05/hollandluchtfoto-uithuizen-menkemaborg_xgaplus.jpg',
            'from_date' => now()->addDays(5),
            'to_date' => now()->addDays(5)->addHours(4),
        ]);
    }
}
