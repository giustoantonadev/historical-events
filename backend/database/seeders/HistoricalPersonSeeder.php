<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HistoricalPerson;

class HistoricalPersonSeeder extends Seeder
{
    public function run(): void
    {
        $people = [
            [
                'name' => 'Romolo',
                'biography' => 'Figura leggendaria della tradizione romana, Romolo è considerato il fondatore di Roma nel 753 a.C. Secondo il mito, insieme al fratello Remo fu allevato da una lupa dopo essere stato abbandonato sulle rive del Tevere. La sua figura rappresenta l’archetipo del sovrano-guerriero e incarna l’origine mitica di una civiltà destinata a dominare il Mediterraneo. Sebbene la sua esistenza storica sia incerta, Romolo rimane un simbolo identitario fondamentale per la cultura romana.',
                'portrait' => 'portraits/romolo.jpg',
                'birth_year' => -771
            ],
            [
                'name' => 'Giulio Cesare',
                'biography' => 'Gaio Giulio Cesare fu uno dei più influenti condottieri e politici della storia romana. Abile stratega, conquistò la Gallia ampliando enormemente i confini della Repubblica. La sua figura è legata a riforme politiche, sociali e amministrative che trasformarono profondamente Roma. La sua morte, avvenuta alle Idi di marzo del 44 a.C., segnò la fine della Repubblica e aprì la strada all’Impero. Cesare è ricordato come un leader carismatico, un brillante oratore e un innovatore militare.',
                'portrait' => 'portraits/giulio_cesare.jpg',
                'birth_year' => -100
            ],
            [
                'name' => 'Cleopatra',
                'biography' => 'Cleopatra VII Filopatore fu l’ultima sovrana del Regno tolemaico d’Egitto. Donna colta, poliglotta e politicamente astuta, cercò di preservare l’indipendenza del suo regno attraverso alleanze strategiche con Giulio Cesare e Marco Antonio. La sua figura è avvolta da fascino e leggenda, spesso rappresentata come simbolo di potere femminile e diplomazia raffinata. La sua morte nel 30 a.C. segnò la fine dell’Egitto indipendente e l’inizio del dominio romano.',
                'portrait' => 'portraits/cleopatra.jpg',
                'birth_year' => -69
            ],
            [
                'name' => 'Leonardo da Vinci',
                'biography' => 'Leonardo da Vinci fu uno dei più grandi geni del Rinascimento. Pittore, scultore, inventore, anatomista e ingegnere, incarnò l’ideale dell’uomo universale. Le sue opere, tra cui la “Gioconda” e l’“Ultima Cena”, sono considerate capolavori assoluti dell’arte occidentale. I suoi studi scientifici, che spaziano dall’anatomia al volo, testimoniano una curiosità inesauribile e una capacità di osservazione straordinaria. Leonardo rappresenta una delle figure più influenti della storia dell’umanità.',
                'portrait' => 'portraits/leonardo_da_vinci.jpg',
                'birth_year' => 1452
            ],
            [
                'name' => 'Napoleone Bonaparte',
                'biography' => 'Napoleone Bonaparte fu uno dei più importanti leader politici e militari della storia moderna. Nato in Corsica, divenne generale durante la Rivoluzione francese e successivamente imperatore dei francesi. Le sue campagne militari ridisegnarono la mappa europea e introdussero riforme durature, come il Codice Civile. Figura controversa, fu al tempo stesso un innovatore politico e un conquistatore ambizioso. La sua eredità continua a influenzare il pensiero politico e militare contemporaneo.',
                'portrait' => 'portraits/napoleone_bonaparte.jpg',
                'birth_year' => 1769
            ],
            [
                'name' => 'Galileo Galilei',
                'biography' => 'Galileo Galilei, scienziato pisano, è considerato il padre della scienza moderna. Le sue osservazioni astronomiche, rese possibili dal perfezionamento del telescopio, rivoluzionarono la comprensione dell’universo. Difensore del metodo sperimentale, Galileo contribuì allo sviluppo della fisica moderna con studi sul moto e sulla dinamica. La sua condanna da parte dell’Inquisizione rappresenta uno dei momenti più drammatici del conflitto tra scienza e autorità religiosa.',
                'portrait' => 'portraits/galileo_galilei.jpg',
                'birth_year' => 1564
            ],
            [
                'name' => 'Cristoforo Colombo',
                'biography' => 'Cristoforo Colombo fu un navigatore ed esploratore genovese al servizio della Corona di Castiglia. Nel 1492 raggiunse le Americhe mentre cercava una rotta occidentale verso le Indie, inaugurando una nuova era di esplorazioni e scambi tra Vecchio e Nuovo Mondo. La sua figura è centrale nella storia globale, simbolo di espansione, contatto culturale e trasformazioni epocali. Le sue spedizioni ebbero conseguenze profonde sulla storia europea e americana.',
                'portrait' => 'portraits/cristoforo_colombo.jpg',
                'birth_year' => 1451
            ],
            [
                'name' => 'Michelangelo',
                'biography' => 'Michelangelo Buonarroti fu uno dei più grandi artisti del Rinascimento. Scultore, pittore, architetto e poeta, realizzò opere immortali come il David, la Pietà e il soffitto della Cappella Sistina. La sua arte, caratterizzata da una straordinaria potenza espressiva e da una profonda spiritualità, influenzò generazioni di artisti. Michelangelo è considerato un maestro assoluto della forma e dell’anatomia, capace di trasformare il marmo in figure di intensità drammatica.',
                'portrait' => 'portraits/michelangelo.jpg',
                'birth_year' => 1475
            ],
            [
                'name' => 'Alessandro Magno',
                'biography' => 'Alessandro III di Macedonia, noto come Alessandro Magno, fu uno dei più grandi conquistatori della storia. In meno di un decennio creò un impero che si estendeva dalla Grecia all’India, diffondendo la cultura ellenistica in tutto il Mediterraneo e il Medio Oriente. Carismatico, audace e stratega brillante, la sua figura è circondata da un’aura leggendaria. La sua morte prematura lasciò un’eredità culturale e politica che influenzò profondamente il mondo antico.',
                'portrait' => 'portraits/alessandro_magno.jpg',
                'birth_year' => -356
            ],
            [
                'name' => 'Winston Churchill',
                'biography' => 'Winston Churchill fu uno dei più importanti statisti del XX secolo. Primo ministro britannico durante la Seconda Guerra Mondiale, guidò il Regno Unito con determinazione e abilità oratoria straordinaria. I suoi discorsi contribuirono a mantenere alto il morale della popolazione nei momenti più difficili del conflitto. Oltre alla carriera politica, Churchill fu anche scrittore, storico e vincitore del Premio Nobel per la Letteratura.',
                'portrait' => 'portraits/winston_churchill.jpg',
                'birth_year' => 1874
            ],
            [
                'name' => 'Albert Einstein',
                'biography' => 'Albert Einstein fu uno dei più influenti fisici della storia. Autore della teoria della relatività ristretta e generale, rivoluzionò la comprensione dello spazio, del tempo e della gravità. Le sue intuizioni scientifiche, unite a una profonda riflessione filosofica, lo resero una figura centrale nella fisica del XX secolo. Nel 1921 ricevette il Premio Nobel per la Fisica per i suoi studi sull’effetto fotoelettrico. Einstein è ricordato anche per il suo impegno civile e umanitario.',
                'portrait' => 'portraits/albert_einstein.jpg',
                'birth_year' => 1879
            ],
            [
                'name' => 'Carlo Magno',
                'biography' => 'Carlo Magno, re dei Franchi e poi imperatore del Sacro Romano Impero, fu uno dei sovrani più influenti del Medioevo. Promosse riforme amministrative, culturali e religiose che portarono alla cosiddetta Rinascita Carolingia. La sua opera contribuì a gettare le basi dell’Europa medievale e della futura identità europea. La sua incoronazione del Natale dell’800 è considerata uno degli eventi più simbolici della storia occidentale.',
                'portrait' => 'portraits/charlemagne.jpg',
                'birth_year' => 742
            ],
            [
                'name' => 'Guglielmo il Conquistatore',
                'biography' => 'Guglielmo I d’Inghilterra, detto il Conquistatore, fu duca di Normandia e protagonista della conquista normanna dell’Inghilterra nel 1066. La sua vittoria nella battaglia di Hastings trasformò radicalmente la società inglese, introducendo nuove strutture politiche e feudali. La sua figura è centrale nella storia medievale europea, simbolo di ambizione, abilità militare e capacità di governo.',
                'portrait' => 'portraits/william_conqueror.jpg',
                'birth_year' => 1028
            ],
            [
                'name' => 'Goffredo di Buglione',
                'biography' => 'Goffredo di Buglione fu uno dei principali leader della Prima Crociata. Dopo la conquista di Gerusalemme nel 1099, divenne il primo sovrano del neonato Regno Latino, assumendo il titolo di “Difensore del Santo Sepolcro” anziché quello di re. La sua figura è ricordata come quella di un cavaliere pio e valoroso, simbolo dell’ideale crociato e della spiritualità guerriera del Medioevo.',
                'portrait' => 'portraits/godfrey.jpg',
                'birth_year' => 1060
            ],
            [
                'name' => 'Giovanni Senzaterra',
                'biography' => 'Giovanni d’Inghilterra, detto Senzaterra, fu un sovrano controverso il cui regno fu segnato da conflitti con la nobiltà e con la Francia. Nel 1215 fu costretto a firmare la Magna Carta, documento che limitava il potere monarchico e garantiva diritti fondamentali ai baroni. Sebbene inizialmente osteggiata, la Magna Carta divenne un simbolo della libertà e del costituzionalismo moderno. La figura di Giovanni è spesso associata alla tensione tra autorità e diritti civili.',
                'portrait' => 'portraits/john.jpg',
                'birth_year' => 1166
            ],
        ];

        foreach ($people as $person) {
            HistoricalPerson::updateOrCreate(
                ['name' => $person['name']],
                $person
            );
        }
    }
}
