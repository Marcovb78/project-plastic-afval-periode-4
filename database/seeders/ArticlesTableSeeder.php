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
            'content' => '<b>In de strijd tegen klimaatverandering wordt alles uit de kast gepakt, ook bij team Strandrover</b>. 

            <br><br>"Wij zijn team Strandrover. Een groep 4e-jaars studenten van de opleiding Industrieel Product Ontwerpen van de Hanzehogeschool Groningen. In het kader van het pre-graduation traject werken wij aan de ontwikkeling van een autonome strandrobot die kan worden ingezet om de Waddenstranden afvalvrij te houden. Het Strandrover-project wordt uitgevoerd door opeenvolgende groepen IPO studenten in samenwerking met studenten van andere opleidingen uitgevoerd gedurende de komende twee jaar. " 
            
            <br><br>Deze groep studenten hopen een verschil te maken op het gebied natuurvervuiling. Een innovatief project met een doel: De stranden schoonhouden en mensen inspireren om bewust om te gaan met afval. 
            <br><br>“Geen betere plek om je voetafdruk te verkleinen dan langs de vloedlijn”
            
            <br><br>Wellicht kom je over een paar jaar wel hun robot tegen op vakantie.
            
            <br><br><span style="font-size: 12px;">bron: strandrover.nl</span>',
            'image' => 'https://images.unsplash.com/photo-1485827404703-89b55fcc595e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80/images/placeholder.jpg',
        ]);

        Article::create([
            'title' => 'Top 10 manieren om plastic afval op te ruimen',
            'content' => '10. Alles dat je in je zakken hebt weggooien.
            Het lijkt misschien raar om te zeggen,
            maar gewoon je afval in de prullenbak doen
            is aardig effectief. Het ruimt lekker op,
            daarom is dit onze nummer 10.
            
            <br><br>9. Leuke tekeningen en schilderingen
            Maak leuke schilderingen om mensen naar
            prullenbakken te leiden, laat je creativiteit
            de vrije loop en zorg samen voor een betere
            omgeving.
            
            <br><br>8.  Statiegeld inzamelen
            Zamel lekker plastic flessen in om te
            voorkomen dat ze in de natuur komen,
            je krijgt er zelf natuurlijk ook wat voor terug.
            
            <br><br>7. Plastic vissen
            Ga lekker met je schepnetje rondlopen en vis
            het afval uit de sloot, anders komt het
            misschien wel in de oceaan.
            
            <br><br>6. Het strand schoonmaken
            Veel afval spoelt aan op stranden, dus pak een
            grijper, afvalzak en ruim het op. Als je mazzel
            hebt komt er ook een mooi stranddagje van.
            
            <br><br>5. Je eigen biologisch afbreekbare plastic beker maken
            Waarom plastic gebruiken als je ook zelf je biologisch afbreekbare beker kan maken?
            
            <br><br>4. Metalen rietjes
            Omdat er steeds minder plastic rietjes worden gebruikt, kun je het beste een metalen rietje halen. Deze gaan langer mee en zijn niet slecht voor de natuur.
            
            <br><br>3. Bamboe
            Er is gewoon heel veel bamboe op deze planeet, dus gebruik het om ecologisch verantwoord te leven.
            
            <br><br> 2. Suppen en scoopen
            Suppen is stand up paddelen, dus suppen en scoopen is stand up paddelen en tegelijkertijd schoonmaken. Leuk
             
            <br><br>1. Ploggen
            Ploggen komt van het zweedse Plocka en het woord joggen. Dus je plukt van de grond af terwijl je aan het joggen bent. Schoon EN gezond
            ',
            'image' => 'https://images.unsplash.com/photo-1604187351574-c75ca79f5807?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80',
        ]);

        Article::create([
            'title' => 'Tips en tricks om plastic afval te verminderen',
            'content' => '<b>Dus, je wil je plasticverbruik verminderen. Hoe doe je dat? Het is lastig om van de ene op de andere dag je verbruik aan te passen. Dus daarom hebben we hier een paar tips en tricks om het wat makkelijker te maken.</b>

            <br><br><b>Tips:</b>
            Begin met nog beter afval scheiden, hierdoor voorkom je sneller dat plastic tussen andere soorten afval terrecht komt. Dit is echt heel handig, want zo krijg je ook beter inzicht in wat voor plastic afval je maakt.
            
            <br><br>Een andere tip is natuurlijk producten met minder verpakkingsmateriaal kopen, hierdoor ontstaat er minder plastic afval in je prullenbak.
            
            <br><br>Maak plastic afval opruimen hip, zodat je vrienden, familie, kinderen en wie dan ook meer afval willen opruimen.
            
            <br><br><b>Tricks:</b>
            
            <br><br>Vervang je plastic tandenborstel voor een tandenborstel van bijv. bamboe, dat is ecologischer en zo verbruik je ook minder plastic.
            
            <br><br>Schoonmaken is leuker als we samen zijn, dus als je gaat ploggen, suppen en wat dan ook. Ga met een groep, dan is het altijd gezelliger.
            
            <br><br>Maak gebruik van de ervaring van anderen, dan kan je bouwen op hun ideeën.
            ',
            'image' => 'https://images.unsplash.com/photo-1611746550721-083db531b3e4?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=735&q=80',
        ]);


        Article::create([
            'title' => 'DE RESULTATEN VAN 2021',
            'content' => 'In 2021 staat Malboro op nummer 1., daardoor is Red Bull gezakt naar de tweede plaats, gevolgd door McDonalds.

            <br><br>De overduidelijke ‘winnaar’ van vorig jaar – de sigarettenfilter– staat ook nu weer op nummer 1. Snoepwikkels staan net als vorig jaar in de top 3. Met de vervanging van zowel sigarettenfilters als plastic wikkels door afbreekbare varianten is snel milieuwinst te boeken. Dit soort plastic producten vergaan namelijk snel tot microplastics en zijn dan nooit meer op te ruimen.
            
            <br><br>Goed nieuws! Het op 1 juli van dit jaar ingevoerde statiegeld op plastic flesjes heeft resultaat geboekt. Het aandeel flesjes in het gevonden zwerfafval is met 37% afgenomen.
            
            <br><br>World Cleanup Day – de grootste opruimactie ter wereld – is ook in Nederland een snel groeiende beweging. In 2021 is in Nederland het recordaantal van ruim 41.342 geregistreerde deelnemers, verdeeld over meer dan 1574 verschillende acties, op pad gegaan om zwerfafval op te ruimen.  
            <br><br>
            <span style="font-size: 12px;">bron: Worldcleanupday.nl</span>',
            'image' => 'https://images.unsplash.com/photo-1597700112072-fa3c1d930655?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1329&q=80',
            'pinned' => true,
        ]);
    }
}
