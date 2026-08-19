<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Period;

class PeriodSeeder extends Seeder
{
    public function run(): void
    {
        $periods = [
            [
                'name' => 'Antichità',
                'start_date' => '0100-01-01',
                'end_date' => '0500-12-31',
                'description' => 'Periodo che comprende le prime grandi civiltà del mondo: Mesopotamia, Egitto, Grecia e Roma. Caratterizzato da innovazioni politiche, filosofiche, artistiche e scientifiche che hanno gettato le basi della cultura occidentale.'
            ],
            [
                'name' => 'Medioevo',
                'start_date' => '0501-01-01',
                'end_date' => '1492-12-31',
                'description' => 'Epoca che segue la caduta dell’Impero Romano d’Occidente. Segnata da regni feudali, crociate, nascita delle università, sviluppo dell’arte romanica e gotica, e profonde trasformazioni sociali e religiose.'
            ],
            [
                'name' => 'Rinascimento',
                'start_date' => '1493-01-01',
                'end_date' => '1600-12-31',
                'description' => 'Periodo di rinascita culturale e artistica, con figure come Leonardo da Vinci, Michelangelo e Raffaello. Caratterizzato da innovazioni scientifiche, esplorazioni geografiche e una nuova visione dell’uomo e del mondo.'
            ],
            [
                'name' => 'Età Moderna',
                'start_date' => '1601-01-01',
                'end_date' => '1900-12-31',
                'description' => 'Epoca delle grandi scoperte geografiche, rivoluzioni scientifiche, nascita degli stati nazionali, Illuminismo, rivoluzioni politiche e industriali che trasformano profondamente la società europea e mondiale.'
            ],
            [
                'name' => 'Età Contemporanea',
                'start_date' => '1901-01-01',
                'end_date' => '2024-12-31',
                'description' => 'Periodo segnato da guerre mondiali, progresso tecnologico, globalizzazione, rivoluzioni sociali e digitali. È l’epoca più vicina al presente, caratterizzata da rapidi cambiamenti culturali e scientifici.'
            ],
        ];

        foreach ($periods as $period) {
            Period::updateOrCreate(
                ['name' => $period['name']],
                $period
            );
        }
    }
}
