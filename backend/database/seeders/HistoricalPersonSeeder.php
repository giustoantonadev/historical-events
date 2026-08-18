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
            ['name' => 'Giulio Cesare', 'biography' => 'Condottiero e politico romano.', 'portrait' => 'portraits/giulio_cesare.jpg'],
            ['name' => 'Cleopatra', 'biography' => 'Ultima sovrana del Regno tolemaico d\'Egitto.', 'portrait' => 'portraits/cleopatra.jpg'],
            ['name' => 'Leonardo da Vinci', 'biography' => 'Artista e inventore del Rinascimento.', 'portrait' => 'portraits/leonardo_da_vinci.jpg'],
            ['name' => 'Napoleone Bonaparte', 'biography' => 'Imperatore dei francesi.', 'portrait' => 'portraits/napoleone_bonaparte.jpg'],
            ['name' => 'Galileo Galilei', 'biography' => 'Padre della scienza moderna.', 'portrait' => 'portraits/galileo_galilei.jpg'],
            ['name' => 'Cristoforo Colombo', 'biography' => 'Esploratore che scoprì l\'America.', 'portrait' => 'portraits/cristoforo_colombo.jpg'],
            ['name' => 'Michelangelo', 'biography' => 'Scultore e pittore del Rinascimento.', 'portrait' => 'portraits/michelangelo.jpg'],
            ['name' => 'Alessandro Magno', 'biography' => 'Conquistatore del mondo antico.', 'portrait' => 'portraits/alessandro_magno.jpg'],
            ['name' => 'Winston Churchill', 'biography' => 'Primo ministro britannico.', 'portrait' => 'portraits/winston_churchill.jpg'],
            ['name' => 'Albert Einstein', 'biography' => 'Fisico teorico, premio Nobel.', 'portrait' => 'portraits/albert_einstein.jpg'],
            
        ];

        foreach ($people as $person) {
            HistoricalPerson::create($person);
        }
    }
}
