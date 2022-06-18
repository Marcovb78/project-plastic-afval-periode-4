<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::create([
            'title' => 'Robots voor een schone toekomst',
            'content' => file_get_contents('http://loripsum.net/api'),
            'image' => '/images/placeholder.jpg',
        ]);

        Article::create([
            'title' => 'Top 10 manieren om plastic afval op te ruimen',
            'content' => file_get_contents('http://loripsum.net/api'),
            'image' => '/images/placeholder.jpg',
        ]);

        Article::create([
            'title' => 'Tips en tricks om plastic afval te verminderen',
            'content' => file_get_contents('http://loripsum.net/api'),
            'image' => '/images/placeholder.jpg',
        ]);


        Article::create([
            'title' => 'DE RESULTATEN VAN 2021',
            'content' => file_get_contents('http://loripsum.net/api'),
            'image' => '/images/placeholder.jpg',
            'pinned' => true,
        ]);
    }
}
