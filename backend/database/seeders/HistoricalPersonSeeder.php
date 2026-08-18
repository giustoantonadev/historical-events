<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HistoricalPerson;

class HistoricalPersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $people = [
            [
                'name' => 'Giulio Cesare',
                'biography' => 'Condottiero e politico romano.',
                'portrait' => 'portraits/giulio_cesare.jpg',
                'birth_year' => -100
            ],
            [
                'name' => 'Cleopatra',
                'biography' => 'Ultima sovrana del Regno tolemaico d\'Egitto.',
                'portrait' => 'portraits/cleopatra.jpg',
                'birth_year' => -69
            ],
            [
                'name' => 'Leonardo da Vinci',
                'biography' => 'Artista e inventore del Rinascimento.',
                'portrait' => 'portraits/leonardo_da_vinci.jpg',
                'birth_year' => 1452
            ],
            [
                'name' => 'Napoleone Bonaparte',
                'biography' => 'Imperatore dei francesi.',
                'portrait' => 'portraits/napoleone_bonaparte.jpg',
                'birth_year' => 1769
            ],
            [
                'name' => 'Galileo Galilei',
                'biography' => 'Padre della scienza moderna.',
                'portrait' => 'portraits/galileo_galilei.jpg',
                'birth_year' => 1564
            ],
            [
                'name' => 'Cristoforo Colombo',
                'biography' => 'Esploratore che scoprì l\'America.',
                'portrait' => 'portraits/cristoforo_colombo.jpg',
                'birth_year' => 1451
            ],
            [
                'name' => 'Michelangelo',
                'biography' => 'Scultore e pittore del Rinascimento.',
                'portrait' => 'portraits/michelangelo.jpg',
                'birth_year' => 1475
            ],
            [
                'name' => 'Alessandro Magno',
                'biography' => 'Conquistatore del mondo antico.',
                'portrait' => 'portraits/alessandro_magno.jpg',
                'birth_year' => -356
            ],
            [
                'name' => 'Winston Churchill',
                'biography' => 'Primo ministro britannico.',
                'portrait' => 'portraits/winston_churchill.jpg',
                'birth_year' => 1874
            ],
            [
                'name' => 'Albert Einstein',
                'biography' => 'Fisico teorico, premio Nobel.',
                'portrait' => 'portraits/albert_einstein.jpg',
                'birth_year' => 1879
            ],
        ];

        foreach ($people as $person) {
            HistoricalPerson::create($person);
        }
    }
}
