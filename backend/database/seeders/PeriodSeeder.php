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
                'description' => 'Periodo che comprende le prime grandi civiltà del mondo: Mesopotamia, Egitto, Grecia e Roma. Caratterizzato da innovazioni politiche, filosofiche, artistiche e scientifiche che hanno gettato le basi della cultura occidentale.',
                'name_en' => 'Antiquity',
                'name_fr' => 'Antiquité',
                'description_en' => 'Period covering the earliest great civilizations of the world: Mesopotamia, Egypt, Greece and Rome. Characterized by political, philosophical, artistic and scientific innovations that laid the foundations of Western culture.',
                'description_fr' => 'Période couvrant les premières grandes civilisations du monde : Mésopotamie, Égypte, Grèce et Rome. Caractérisée par des innovations politiques, philosophiques, artistiques et scientifiques qui ont jeté les bases de la culture occidentale.'
            ],
            [
                'name' => 'Medioevo',
                'start_date' => '0501-01-01',
                'end_date' => '1492-12-31',
                'description' => 'Epoca che segue la caduta dell’Impero Romano d’Occidente. Segnata da regni feudali, crociate, nascita delle università, sviluppo dell’arte romanica e gotica, e profonde trasformazioni sociali e religiose.',
                'name_en' => 'Middle Ages',
                'name_fr' => 'Moyen Âge',
                'description_en' => 'Era following the fall of the Western Roman Empire. Marked by feudal kingdoms, the Crusades, the rise of universities, the development of Romanesque and Gothic art, and deep social and religious transformations.',
                'description_fr' => 'Période suivant la chute de l’Empire romain d’Occident. Marquée par les royaumes féodaux, les croisades, l’apparition des universités, le développement de l’art roman et gothique, et de profondes transformations sociales et religieuses.'
            ],
            [
                'name' => 'Rinascimento',
                'start_date' => '1493-01-01',
                'end_date' => '1600-12-31',
                'description' => 'Periodo di rinascita culturale e artistica, con figure come Leonardo da Vinci, Michelangelo e Raffaello. Caratterizzato da innovazioni scientifiche, esplorazioni geografiche e una nuova visione dell’uomo e del mondo.',
                'name_en' => 'Renaissance',
                'name_fr' => 'Renaissance',
                'description_en' => 'Period of cultural and artistic rebirth with figures such as Leonardo da Vinci, Michelangelo and Raphael. Characterized by scientific innovations, geographical discoveries and a renewed vision of humanity and the world.',
                'description_fr' => 'Période de renaissance culturelle et artistique avec des figures telles que Léonard de Vinci, Michel-Ange et Raphaël. Caractérisée par des innovations scientifiques, des découvertes géographiques et une vision renouvelée de l’homme et du monde.'
            ],
            [
                'name' => 'Età Moderna',
                'start_date' => '1601-01-01',
                'end_date' => '1900-12-31',
                'description' => 'Epoca delle grandi scoperte geografiche, rivoluzioni scientifiche, nascita degli stati nazionali, Illuminismo, rivoluzioni politiche e industriali che trasformano profondamente la società europea e mondiale.',
                'name_en' => 'Early Modern Age',
                'name_fr' => 'Époque moderne',
                'description_en' => 'Era of great geographical discoveries, scientific revolutions, the birth of nation-states, the Enlightenment, and political and industrial revolutions that profoundly transformed European and global society.',
                'description_fr' => 'Période des grandes découvertes géographiques, des révolutions scientifiques, de la naissance des États-nations, des Lumières et des révolutions politiques et industrielles qui ont profondément transformé la société européenne et mondiale.'
            ],
            [
                'name' => 'Età Contemporanea',
                'start_date' => '1901-01-01',
                'end_date' => '2024-12-31',
                'description' => 'Periodo segnato da guerre mondiali, progresso tecnologico, globalizzazione, rivoluzioni sociali e digitali. È l’epoca più vicina al presente, caratterizzata da rapidi cambiamenti culturali e scientifici.',
                'name_en' => 'Contemporary Age',
                'name_fr' => 'Époque contemporaine',
                'description_en' => 'Period marked by world wars, technological progress, globalization, social and digital revolutions. It is the era closest to the present, characterized by rapid cultural and scientific changes.',
                'description_fr' => 'Période marquée par les guerres mondiales, le progrès technologique, la mondialisation et les révolutions sociales et numériques. C’est l’époque la plus proche du présent, caractérisée par des changements culturels et scientifiques rapides.'
            ],
        ];

        foreach ($periods as $period) {
            $periodData = $period;
            $periodData['description_it'] = $period['description'];

            Period::updateOrCreate(
                ['name' => $period['name']],
                $periodData
            );
        }
    }
}
