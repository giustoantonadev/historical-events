<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HistoricalEvent;
use App\Models\HistoricalPerson;
use App\Models\Period;

class HistoricalEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'title' => 'Scoperta dell\'America',
                'description' => 'Cristoforo Colombo raggiunge il continente americano.',
                'year' => 1492,
                'period_id' => Period::where('name', 'Rinascimento')->first()->id,
                'people' => ['Cristoforo Colombo']
            ],
            [
                'title' => 'Battaglia di Waterloo',
                'description' => 'Sconfitta definitiva di Napoleone.',
                'year' => 1815,
                'period_id' => Period::where('name', 'Età Moderna')->first()->id,
                'people' => ['Napoleone Bonaparte']
            ],
            [
                'title' => 'Invenzione del telescopio',
                'description' => 'Galileo perfeziona il telescopio.',
                'year' => 1609,
                'period_id' => Period::where('name', 'Età Moderna')->first()->id,
                'people' => ['Galileo Galilei']
            ],
            [
                'title' => 'Rinascimento Italiano',
                'description' => 'Periodo di grande sviluppo artistico.',
                'year' => 1500,
                'period_id' => Period::where('name', 'Rinascimento')->first()->id,
                'people' => ['Leonardo da Vinci', 'Michelangelo']
            ],
            [
                'title' => 'Fondazione di Roma',
                'description' => 'Secondo la tradizione, Romolo fonda Roma.',
                'year' => -753,
                'period_id' => Period::where('name', 'Antichità')->first()->id,
                'people' => ['Romolo']
            ],
            [
                'title' => 'Assassinio di Giulio Cesare',
                'description' => 'Giulio Cesare viene assassinato alle Idi di marzo.',
                'year' => -44,
                'period_id' => Period::where('name', 'Antichità')->first()->id,
                'people' => ['Giulio Cesare']
            ],
            [
                'title' => 'Campagne di Alessandro Magno',
                'description' => 'Alessandro Magno conquista gran parte del mondo conosciuto.',
                'year' => -330,
                'period_id' => Period::where('name', 'Antichità')->first()->id,
                'people' => ['Alessandro Magno']
            ],
            [
                'title' => 'Regno di Cleopatra',
                'description' => 'Cleopatra governa l\'Egitto tolemaico.',
                'year' => -51,
                'period_id' => Period::where('name', 'Antichità')->first()->id,
                'people' => ['Cleopatra']
            ],
            [
                'title' => 'Scoperta della Relatività',
                'description' => 'Albert Einstein pubblica la teoria della relatività ristretta.',
                'year' => 1905,
                'period_id' => Period::where('name', 'Età Contemporanea')->first()->id,
                'people' => ['Albert Einstein']
            ],
            [
                'title' => 'Seconda Guerra Mondiale',
                'description' => 'Winston Churchill guida il Regno Unito contro le potenze dell\'Asse.',
                'year' => 1940,
                'period_id' => Period::where('name', 'Età Contemporanea')->first()->id,
                'people' => ['Winston Churchill']
            ],
            [
                'title' => 'Scoperta dei satelliti di Giove',
                'description' => 'Galileo Galilei osserva i satelliti medicei.',
                'year' => 1610,
                'period_id' => Period::where('name', 'Età Moderna')->first()->id,
                'people' => ['Galileo Galilei']
            ],
            [
                'title' => 'Pittura della Cappella Sistina',
                'description' => 'Michelangelo completa il soffitto della Cappella Sistina.',
                'year' => 1512,
                'period_id' => Period::where('name', 'Rinascimento')->first()->id,
                'people' => ['Michelangelo']
            ],
            [
                'title' => 'Ultima Cena',
                'description' => 'Leonardo da Vinci dipinge il celebre affresco a Milano.',
                'year' => 1498,
                'period_id' => Period::where('name', 'Rinascimento')->first()->id,
                'people' => ['Leonardo da Vinci']
            ],
            [
                'title' => 'Progetto della Macchina Volante',
                'description' => 'Leonardo da Vinci studia il volo e progetta macchine innovative.',
                'year' => 1505,
                'period_id' => Period::where('name', 'Rinascimento')->first()->id,
                'people' => ['Leonardo da Vinci']
            ],
            [
                'title' => 'Viaggio verso le Indie',
                'description' => 'Cristoforo Colombo intraprende il suo primo viaggio verso le Indie.',
                'year' => 1492,
                'period_id' => Period::where('name', 'Rinascimento')->first()->id,
                'people' => ['Cristoforo Colombo']
            ],
            [
                'title' => 'Campagna d\'Egitto',
                'description' => 'Napoleone Bonaparte guida la spedizione militare in Egitto.',
                'year' => 1798,
                'period_id' => Period::where('name', 'Età Moderna')->first()->id,
                'people' => ['Napoleone Bonaparte']
            ],
            [
                'title' => 'Battaglia di Alesia',
                'description' => 'Giulio Cesare sconfigge Vercingetorige nella battaglia decisiva.',
                'year' => -52,
                'period_id' => Period::where('name', 'Antichità')->first()->id,
                'people' => ['Giulio Cesare']
            ],
            [
                'title' => 'Fondazione di Alessandria',
                'description' => 'Alessandro Magno fonda la città di Alessandria d\'Egitto.',
                'year' => -331,
                'period_id' => Period::where('name', 'Antichità')->first()->id,
                'people' => ['Alessandro Magno']
            ],
            [
                'title' => 'Relatività Generale',
                'description' => 'Einstein pubblica la teoria della relatività generale.',
                'year' => 1915,
                'period_id' => Period::where('name', 'Età Contemporanea')->first()->id,
                'people' => ['Albert Einstein']
            ],
            [
                'title' => 'Battaglia d\'Inghilterra',
                'description' => 'Churchill guida la resistenza britannica contro la Luftwaffe.',
                'year' => 1940,
                'period_id' => Period::where('name', 'Età Contemporanea')->first()->id,
                'people' => ['Winston Churchill']
            ],

        ];

        foreach ($events as $event) {
            $historicalEvent = HistoricalEvent::create([
                'title' => $event['title'],
                'description' => $event['description'],
                'year' => $event['year'],
                'period_id' => $event['period_id'],
                'image' => null,
            ]);

            $personsIds = HistoricalPerson::whereIn('name', $event['people'])->pluck('id');
            $historicalEvent->historicalPeople()->sync($personsIds);
        }
    }
}
