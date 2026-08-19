<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Period;

class PeriodsMultilangSeeder extends Seeder
{
    public function run(): void
    {
        // Provide human-friendly translations for periods
        $translations = [
            'Antichità' => [
                'name_en' => 'Antiquity',
                'name_fr' => 'Antiquité',
                'description_en' => 'Period covering the early great civilizations: Mesopotamia, Egypt, Greece and Rome.',
                'description_fr' => 'Période couvrant les premières grandes civilisations : Mésopotamie, Égypte, Grèce et Rome.'
            ],
            'Medioevo' => [
                'name_en' => 'Middle Ages',
                'name_fr' => 'Moyen Âge',
                'description_en' => 'Era following the fall of the Western Roman Empire, marked by feudal kingdoms and the Crusades.',
                'description_fr' => 'Époque suivant la chute de l’Empire romain d’Occident, marquée par les royaumes féodaux et les croisades.'
            ],
            'Rinascimento' => [
                'name_en' => 'Renaissance',
                'name_fr' => 'Renaissance',
                'description_en' => 'Cultural and artistic revival with figures like Leonardo da Vinci and Michelangelo.',
                'description_fr' => 'Renaissance culturelle et artistique avec des figures comme Léonard de Vinci et Michel-Ange.'
            ],
            'Età Moderna' => [
                'name_en' => 'Modern Age',
                'name_fr' => 'Époque moderne',
                'description_en' => 'Age of discoveries, Enlightenment and industrial revolutions.',
                'description_fr' => 'Âge des découvertes, des Lumières et des révolutions industrielles.'
            ],
            'Età Contemporanea' => [
                'name_en' => 'Contemporary Age',
                'name_fr' => 'Époque contemporaine',
                'description_en' => 'Period marked by world wars, technological progress and globalization.',
                'description_fr' => 'Période marquée par les guerres mondiales, le progrès technologique et la mondialisation.'
            ],
        ];

        foreach ($translations as $itName => $data) {
            Period::where('name', $itName)->update(array_merge([
                'name_it' => $itName,
                'description_it' => \DB::raw('description'),
            ], $data));
        }
    }
}
