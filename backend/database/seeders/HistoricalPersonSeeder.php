<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HistoricalPerson;

class HistoricalPersonSeeder extends Seeder
{
    public function run(): void
    {
        /**
         * @var array<int, array{name: string, biography: string, portrait?: string, birth_year?: int}> $people
         */
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

        /**
         * @var array<string, array{en?: array{name?: string, biography?: string}, fr?: array{name?: string, biography?: string}}> $translations
         */
        $translations = [
            'Romolo' => [
                'en' => [
                    'name' => 'Romulus',
                    'biography' => 'Legendary figure of Roman tradition, Romulus is considered the founder of Rome in 753 BC. According to myth, together with his brother Remus he was raised by a she-wolf after being abandoned on the banks of the Tiber. He embodies the archetype of the warrior-king and the mythical origin of a civilization destined to dominate the Mediterranean. Although his historical existence is uncertain, Romulus remains a central identity symbol of Roman culture.'
                ],
                'fr' => [
                    'name' => 'Romulus',
                    'biography' => 'Figure légendaire de la tradition romaine, Romulus est considéré comme le fondateur de Rome en 753 av. J.-C. Selon le mythe, avec son frère Rémus, il fut élevé par une louve après avoir été abandonné sur les rives du Tibre. Il incarne l’archétype du souverain-guerrier et l’origine mythique d’une civilisation destinée à dominer la Méditerranée. Bien que son existence historique soit incertaine, Romulus reste un symbole identitaire central de la culture romaine.'
                ]
            ],
            'Giulio Cesare' => [
                'en' => [
                    'name' => 'Julius Caesar',
                    'biography' => 'Gaius Julius Caesar was one of the most influential commanders and politicians in Roman history. A skilled strategist, he conquered Gaul and greatly expanded the Republic’s borders. His legacy includes political, social and administrative reforms that transformed Rome. His death on the Ides of March in 44 BC marked the end of the Republic and paved the way for the Empire.'
                ],
                'fr' => [
                    'name' => 'Jules César',
                    'biography' => 'Gaius Jules César fut l’un des commandants et hommes politiques les plus influents de l’histoire romaine. Stratège habile, il conquit la Gaule et étendit largement les frontières de la République. Son héritage comprend des réformes politiques, sociales et administratives ayant transformé Rome. Sa mort aux Ides de mars en 44 av. J.-C. marqua la fin de la République et ouvrit la voie à l’Empire.'
                ]
            ],
            'Cleopatra' => [
                'en' => [
                    'name' => 'Cleopatra',
                    'biography' => 'Cleopatra VII Philopator was the last ruler of the Ptolemaic Kingdom of Egypt. Educated, multilingual and politically astute, she sought to preserve her kingdom’s independence through strategic alliances with Julius Caesar and Mark Antony. Her death in 30 BC marked the end of independent Egypt and the start of Roman rule.'
                ],
                'fr' => [
                    'name' => 'Cléopâtre',
                    'biography' => 'Cléopâtre VII Philopator fut la dernière souveraine du royaume lagide d’Égypte. Éduquée, polyglotte et politiquement avisée, elle chercha à préserver l’indépendance de son royaume par des alliances stratégiques avec Jules César et Marc Antoine. Sa mort en 30 av. J.-C. marqua la fin de l’Égypte indépendante et le début de la domination romaine.'
                ]
            ],
            'Leonardo da Vinci' => [
                'en' => [
                    'name' => 'Leonardo da Vinci',
                    'biography' => 'Leonardo da Vinci was one of the greatest geniuses of the Renaissance. Painter, sculptor, inventor, anatomist and engineer, he embodied the ideal of the universal man. His works, including the Mona Lisa and The Last Supper, are considered masterpieces. His scientific studies, from anatomy to flight, show boundless curiosity and extraordinary observational skills.'
                ],
                'fr' => [
                    'name' => 'Léonard de Vinci',
                    'biography' => 'Léonard de Vinci fut l’un des plus grands génies de la Renaissance. Peintre, sculpteur, inventeur, anatomiste et ingénieur, il incarnait l’idéal de l’homme universel. Ses œuvres, dont la Joconde et La Cène, sont considérées comme des chefs-d’œuvre. Ses études scientifiques, de l’anatomie au vol, témoignent d’une curiosité inépuisable et d’une capacité d’observation extraordinaire.'
                ]
            ],
            'Napoleone Bonaparte' => [
                'en' => [
                    'name' => 'Napoleon Bonaparte',
                    'biography' => 'Napoleon Bonaparte was a leading political and military figure of modern history. Born in Corsica, he rose during the French Revolution and later became Emperor of the French. His campaigns reshaped Europe and introduced lasting reforms such as the Napoleonic Code.'
                ],
                'fr' => [
                    'name' => 'Napoléon Bonaparte',
                    'biography' => 'Napoléon Bonaparte fut un dirigeant politique et militaire majeur de l’histoire moderne. Né en Corse, il s’éleva pendant la Révolution française puis devint empereur des Français. Ses campagnes remodelèrent l’Europe et introduisirent des réformes durables telles que le Code Napoléon.'
                ]
            ],
            'Galileo Galilei' => [
                'en' => [
                    'name' => 'Galileo Galilei',
                    'biography' => 'Galileo Galilei, a scientist from Pisa, is considered the father of modern science. His astronomical observations, enabled by the telescope, revolutionized the understanding of the universe. A defender of the experimental method, his trial with the Inquisition marks a dramatic conflict between science and religious authority.'
                ],
                'fr' => [
                    'name' => 'Galilée (Galileo Galilei)',
                    'biography' => 'Galileo Galilei, scientifique de Pise, est considéré comme le père de la science moderne. Ses observations astronomiques, rendues possibles par le télescope, révolutionnèrent la compréhension de l’univers. Défenseur de la méthode expérimentale, son procès devant l’Inquisition marque un conflit dramatique entre la science et l’autorité religieuse.'
                ]
            ],
            'Cristoforo Colombo' => [
                'en' => [
                    'name' => 'Christopher Columbus',
                    'biography' => 'Christopher Columbus was a Genoese navigator and explorer in the service of the Crown of Castile. In 1492 he reached the Americas while searching for a western route to the Indies, opening a new era of exploration and exchanges between the Old and New Worlds.'
                ],
                'fr' => [
                    'name' => 'Christophe Colomb',
                    'biography' => 'Christophe Colomb était un navigateur génois au service de la Couronne de Castille. En 1492, il atteignit les Amériques alors qu’il cherchait une route occidentale vers les Indes, ouvrant une nouvelle ère d’exploration et d’échanges entre l’Ancien et le Nouveau Monde.'
                ]
            ],
            'Michelangelo' => [
                'en' => [
                    'name' => 'Michelangelo',
                    'biography' => 'Michelangelo Buonarroti was one of the greatest artists of the Renaissance. Sculptor, painter, architect and poet, he created masterpieces such as David, the Pietà and the Sistine Chapel ceiling.'
                ],
                'fr' => [
                    'name' => 'Michel-Ange',
                    'biography' => 'Michel-Ange Buonarroti fut l’un des plus grands artistes de la Renaissance. Sculpteur, peintre, architecte et poète, il créa des chefs-d’œuvre comme le David, la Pietà et le plafond de la chapelle Sixtine.'
                ]
            ],
            'Alessandro Magno' => [
                'en' => [
                    'name' => 'Alexander the Great',
                    'biography' => 'Alexander III of Macedon, known as Alexander the Great, was one of history’s greatest conquerors. In less than a decade he built an empire from Greece to India, spreading Hellenistic culture across the Mediterranean and Near East.'
                ],
                'fr' => [
                    'name' => 'Alexandre le Grand',
                    'biography' => 'Alexandre III de Macédoine, dit Alexandre le Grand, fut l’un des plus grands conquérants de l’histoire. En moins d’une décennie, il créa un empire allant de la Grèce à l’Inde, diffusant la culture hellénistique dans tout le bassin méditerranéen et le Proche-Orient.'
                ]
            ],
            'Winston Churchill' => [
                'en' => [
                    'name' => 'Winston Churchill',
                    'biography' => 'Winston Churchill was one of the most important statesmen of the 20th century. As British Prime Minister during World War II, his leadership and speeches were crucial in sustaining national morale.'
                ],
                'fr' => [
                    'name' => 'Winston Churchill',
                    'biography' => 'Winston Churchill fut l’un des grands hommes d’Etat du XXe siècle. En tant que Premier ministre britannique pendant la Seconde Guerre mondiale, son leadership et ses discours furent essentiels pour maintenir le moral national.'
                ]
            ],
            'Albert Einstein' => [
                'en' => [
                    'name' => 'Albert Einstein',
                    'biography' => 'Albert Einstein was one of the most influential physicists in history. Author of the theories of special and general relativity, he revolutionized our understanding of space, time and gravity.'
                ],
                'fr' => [
                    'name' => 'Albert Einstein',
                    'biography' => 'Albert Einstein fut l’un des physiciens les plus influents de l’histoire. Auteur des théories de la relativité restreinte et générale, il révolutionna notre compréhension de l’espace, du temps et de la gravité.'
                ]
            ],
            'Carlo Magno' => [
                'en' => [
                    'name' => 'Charlemagne',
                    'biography' => 'Charlemagne, king of the Franks and later Emperor of the Holy Roman Empire, was one of the most influential rulers of the Middle Ages. He promoted administrative, cultural and religious reforms that helped shape medieval Europe.'
                ],
                'fr' => [
                    'name' => 'Charlemagne',
                    'biography' => 'Charlemagne, roi des Francs puis empereur du Saint-Empire romain, fut l’un des souverains les plus influents du Moyen Âge. Il promut des réformes administratives, culturelles et religieuses qui contribuèrent à façonner l’Europe médiévale.'
                ]
            ],
            'Guglielmo il Conquistatore' => [
                'en' => [
                    'name' => 'William the Conqueror',
                    'biography' => 'William I of England, known as the Conqueror, was Duke of Normandy who led the Norman conquest of England in 1066. His victory at Hastings transformed English society and governance.'
                ],
                'fr' => [
                    'name' => 'Guillaume le Conquérant',
                    'biography' => 'Guillaume Ier d’Angleterre, dit le Conquérant, fut duc de Normandie qui mena la conquête normande de l’Angleterre en 1066. Sa victoire à Hastings transforma la société et le gouvernement anglais.'
                ]
            ],
            'Goffredo di Buglione' => [
                'en' => [
                    'name' => 'Godfrey of Bouillon',
                    'biography' => 'Godfrey of Bouillon was one of the principal leaders of the First Crusade. After the conquest of Jerusalem in 1099 he became the first ruler of the new Latin Kingdom, taking the title Defender of the Holy Sepulchre.'
                ],
                'fr' => [
                    'name' => 'Godefroy de Bouillon',
                    'biography' => 'Godefroy de Bouillon fut l’un des principaux leaders de la Première croisade. Après la conquête de Jérusalem en 1099, il devint le premier souverain du nouveau Royaume latin, portant le titre de Défenseur du Saint-Sépulcre.'
                ]
            ],
            'Giovanni Senzaterra' => [
                'en' => [
                    'name' => 'John Lackland',
                    'biography' => 'John of England, known as Lackland, was a controversial ruler whose reign was marked by conflicts with the nobility and France. In 1215 he was forced to accept the Magna Carta, a document limiting royal power and guaranteeing certain baronial rights.'
                ],
                'fr' => [
                    'name' => 'Jean sans Terre',
                    'biography' => 'Jean d’Angleterre, dit Sans Terre, fut un souverain controversé dont le règne fut marqué par des conflits avec la noblesse et la France. En 1215, il fut contraint d’accepter la Magna Carta, document limitant le pouvoir royal et garantissant certains droits des barons.'
                ]
            ],
        ];

        foreach ($people as $person) {
            /** @var array{name: string, biography: string, portrait?: string, birth_year?: int} $person */
            $personData = $person;
            $personData['name_it'] = $person['name'];
            $personData['biography_it'] = $person['biography'];

            $key = $person['name'];
            if (array_key_exists($key, $translations)) {
                $t = $translations[$key];
                $en = is_array($t['en'] ?? null) ? $t['en'] : [];
                $fr = is_array($t['fr'] ?? null) ? $t['fr'] : [];

                $personData['name_en'] = $en['name'] ?? $person['name'];
                $personData['biography_en'] = $en['biography'] ?? $person['biography'];
                $personData['name_fr'] = $fr['name'] ?? $person['name'];
                $personData['biography_fr'] = $fr['biography'] ?? $person['biography'];
            } else {
                $personData['name_en'] = $person['name'];
                $personData['biography_en'] = $person['biography'];
                $personData['name_fr'] = $person['name'];
                $personData['biography_fr'] = $person['biography'];
            }

            HistoricalPerson::updateOrCreate(
                ['name' => $person['name']],
                $personData
            );
        }
    }
}
