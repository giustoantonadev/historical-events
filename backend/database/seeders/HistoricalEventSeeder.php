<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HistoricalEvent;
use App\Models\HistoricalPerson;
use App\Models\Period;

class HistoricalEventSeeder extends Seeder
{
    public function run(): void
    {
        $events = [

            // ===================== RINASCIMENTO =====================
            [
                'title' => 'Scoperta dell\'America',
                'description' => 'Nel 1492 Cristoforo Colombo, navigatore genovese al servizio della Corona di Castiglia, raggiunge le coste di un nuovo continente mentre tenta di trovare una rotta occidentale verso le Indie. La spedizione, composta da tre caravelle, segna l\'inizio dell\'espansione europea nel Nuovo Mondo e rappresenta uno dei momenti più dirompenti della storia globale, modificando per sempre gli equilibri economici, culturali e geopolitici del pianeta.',
                'year' => 1492,
                'period_id' => Period::where('name', 'Rinascimento')->first()->id,
                'image' => 'scoperta-america.jpg',
                'people' => ['Cristoforo Colombo']
            ],
            [
                'title' => 'Rinascimento Italiano',
                'description' => 'Il Rinascimento italiano, fiorito tra il XV e il XVI secolo, rappresenta una delle epoche di maggiore splendore artistico, culturale e scientifico della storia umana. In questo periodo, città come Firenze, Roma e Milano diventano centri di innovazione, dove artisti, scienziati e filosofi ridefiniscono i concetti di bellezza, proporzione e conoscenza. Le opere di Leonardo da Vinci e Michelangelo segnano un punto di svolta nella storia dell’arte, fondendo osservazione scientifica, tecnica magistrale e profondità spirituale.',
                'year' => 1500,
                'period_id' => Period::where('name', 'Rinascimento')->first()->id,
                'image' => 'rinascimento-italiano.jpg',
                'people' => ['Leonardo da Vinci', 'Michelangelo']
            ],
            [
                'title' => 'Pittura della Cappella Sistina',
                'description' => 'Tra il 1508 e il 1512 Michelangelo Buonarroti realizza il soffitto della Cappella Sistina, uno dei capolavori assoluti dell’arte occidentale. L’opera, commissionata da papa Giulio II, rappresenta una visione monumentale della creazione, dell’umanità e del rapporto tra uomo e divino. La potenza espressiva delle figure, la complessità della composizione e l’innovazione tecnica rendono la Sistina un punto di riferimento imprescindibile per la storia dell’arte.',
                'year' => 1512,
                'period_id' => Period::where('name', 'Rinascimento')->first()->id,
                'image' => 'cappella-sistina.jpg',
                'people' => ['Michelangelo']
            ],
            [
                'title' => 'Ultima Cena',
                'description' => 'Realizzata tra il 1494 e il 1498 nel refettorio di Santa Maria delle Grazie a Milano, l’Ultima Cena di Leonardo da Vinci è una delle opere più celebri e studiate della storia dell’arte. Leonardo rivoluziona la tradizione iconografica, rappresentando il momento drammatico in cui Cristo annuncia il tradimento. La composizione, la resa psicologica dei personaggi e l’uso innovativo della prospettiva conferiscono all’opera una forza narrativa senza precedenti.',
                'year' => 1498,
                'period_id' => Period::where('name', 'Rinascimento')->first()->id,
                'image' => 'ultima-cena.jpg',
                'people' => ['Leonardo da Vinci']
            ],
            [
                'title' => 'Progetto della Macchina Volante',
                'description' => 'All’inizio del XVI secolo Leonardo da Vinci dedica numerosi studi al volo umano, analizzando il movimento degli uccelli e progettando macchine capaci di imitare le loro dinamiche. I suoi disegni, tra cui l’ornitottero e il celebre “aeroplano”, testimoniano una visione straordinariamente moderna, anticipando concetti che verranno sviluppati solo secoli dopo con l’avvento dell’aviazione. Sebbene mai realizzate, queste invenzioni rappresentano un simbolo dell’ingegno rinascimentale.',
                'year' => 1505,
                'period_id' => Period::where('name', 'Rinascimento')->first()->id,
                'image' => 'macchina-volante.jpg',
                'people' => ['Leonardo da Vinci']
            ],

            // ===================== ETÀ MODERNA =====================
            [
                'title' => 'Invenzione del telescopio',
                'description' => 'Nel 1609 Galileo Galilei perfeziona il telescopio, strumento che gli permette di osservare il cielo con una precisione mai raggiunta prima. Le sue scoperte, tra cui le montagne lunari e le fasi di Venere, rivoluzionano l’astronomia e mettono in crisi la visione geocentrica dell’universo. L’uso del telescopio segna l’inizio dell’osservazione scientifica moderna e contribuisce alla nascita della rivoluzione scientifica.',
                'year' => 1609,
                'period_id' => Period::where('name', 'Età Moderna')->first()->id,
                'image' => 'invenzione-telescopio.jpg',
                'people' => ['Galileo Galilei']
            ],
            [
                'title' => 'Scoperta dei satelliti di Giove',
                'description' => 'Nel 1610 Galileo Galilei osserva quattro satelliti orbitare attorno a Giove, oggi noti come satelliti medicei. Questa scoperta fornisce una prova fondamentale contro il modello geocentrico aristotelico, dimostrando che non tutti i corpi celesti ruotano attorno alla Terra. L’osservazione dei satelliti gioviani rappresenta una pietra miliare nella storia dell’astronomia e nella nascita della cosmologia moderna.',
                'year' => 1610,
                'period_id' => Period::where('name', 'Età Moderna')->first()->id,
                'image' => 'satelliti-di-giove.jpg',
                'people' => ['Galileo Galilei']
            ],
            [
                'title' => 'Campagna d\'Egitto',
                'description' => 'Nel 1798 Napoleone Bonaparte guida una vasta spedizione militare in Egitto con l’obiettivo di indebolire la potenza britannica e aprire nuove vie commerciali. La campagna, pur non raggiungendo gli obiettivi strategici, porta alla scoperta della Stele di Rosetta e inaugura l’egittologia moderna. L’incontro tra cultura europea e civiltà egizia genera un enorme interesse scientifico e archeologico.',
                'year' => 1798,
                'period_id' => Period::where('name', 'Età Moderna')->first()->id,
                'image' => 'campagna-egitto.jpg',
                'people' => ['Napoleone Bonaparte']
            ],
            [
                'title' => 'Battaglia di Waterloo',
                'description' => 'Il 18 giugno 1815, nei pressi del villaggio di Waterloo, le forze napoleoniche affrontano l’esercito anglo-olandese guidato dal duca di Wellington e le truppe prussiane del generale Blücher. La sconfitta segna la fine definitiva dell’epopea napoleonica e chiude un capitolo cruciale della storia europea, aprendo la strada a un nuovo equilibrio politico sancito dal Congresso di Vienna.',
                'year' => 1815,
                'period_id' => Period::where('name', 'Età Moderna')->first()->id,
                'image' => 'battaglia-waterloo.jpg',
                'people' => ['Napoleone Bonaparte']
            ],

            // ===================== ANTICHITÀ =====================
            [
                'title' => 'Fondazione di Roma',
                'description' => 'Secondo la tradizione, nel 753 a.C. Romolo fonda la città di Roma sul colle Palatino. Sebbene il racconto sia avvolto nel mito, la nascita di Roma rappresenta l’inizio di una civiltà destinata a dominare il Mediterraneo per secoli. La leggenda dei gemelli allevati dalla lupa simboleggia la forza, la resilienza e il destino imperiale della città.',
                'year' => -753,
                'period_id' => Period::where('name', 'Antichità')->first()->id,
                'image' => 'fondazione-roma.jpg',
                'people' => ['Romolo']
            ],
            [
                'title' => 'Assassinio di Giulio Cesare',
                'description' => 'Il 15 marzo del 44 a.C., durante una seduta del Senato, Giulio Cesare viene assassinato da un gruppo di congiurati guidati da Bruto e Cassio. L’evento, noto come le Idi di marzo, segna la fine della Repubblica romana e apre la strada alla nascita dell’Impero. La morte di Cesare rappresenta uno dei momenti più drammatici e simbolici della storia antica.',
                'year' => -44,
                'period_id' => Period::where('name', 'Antichità')->first()->id,
                'image' => 'assassinio-giulio-cesare.jpg',
                'people' => ['Giulio Cesare']
            ],
            [
                'title' => 'Campagne di Alessandro Magno',
                'description' => 'Tra il 334 e il 323 a.C. Alessandro Magno conduce una serie di campagne militari che portano alla conquista dell’Impero persiano e alla creazione di uno dei più vasti imperi dell’antichità. La sua figura incarna l’ideale del sovrano guerriero, capace di unire strategia, carisma e ambizione. Le sue conquiste favoriscono la diffusione della cultura ellenistica in tutto il Mediterraneo e il Medio Oriente.',
                'year' => -330,
                'period_id' => Period::where('name', 'Antichità')->first()->id,
                'image' => 'campagne-alessandro-magno.jpg',
                'people' => ['Alessandro Magno']
            ],
            [
                'title' => 'Regno di Cleopatra',
                'description' => 'Cleopatra VII, ultima sovrana del Regno tolemaico d’Egitto, governa in un periodo di grande instabilità politica. Donna colta e stratega raffinata, tenta di preservare l’indipendenza dell’Egitto attraverso alleanze con Giulio Cesare e Marco Antonio. La sua figura, avvolta da fascino e leggenda, rappresenta uno degli esempi più celebri di leadership femminile dell’antichità.',
                'year' => -51,
                'period_id' => Period::where('name', 'Antichità')->first()->id,
                'image' => 'regno-cleopatra.jpg',
                'people' => ['Cleopatra']
            ],
            [
                'title' => 'Battaglia di Alesia',
                'description' => 'Nel 52 a.C. Giulio Cesare affronta Vercingetorige nella battaglia di Alesia, uno degli scontri più celebri della guerra gallica. Grazie a un’imponente opera di fortificazioni e a una strategia magistrale, Cesare ottiene una vittoria decisiva che consolida il dominio romano sulla Gallia. L’episodio rappresenta un capolavoro di ingegneria militare e tattica bellica.',
                'year' => -52,
                'period_id' => Period::where('name', 'Antichità')->first()->id,
                'image' => 'battaglia-alesia.jpg',
                'people' => ['Giulio Cesare']
            ],
            [
                'title' => 'Fondazione di Alessandria',
                'description' => 'Nel 331 a.C. Alessandro Magno fonda Alessandria d’Egitto, destinata a diventare uno dei più importanti centri culturali del mondo antico. La città ospiterà la celebre Biblioteca di Alessandria e diventerà un crocevia di scambi scientifici, filosofici e commerciali. La sua fondazione segna l’inizio dell’ellenismo in Egitto.',
                'year' => -331,
                'period_id' => Period::where('name', 'Antichità')->first()->id,
                'image' => 'fondazione-alessandria.jpg',
                'people' => ['Alessandro Magno']
            ],

            // ===================== ETÀ CONTEMPORANEA =====================
            [
                'title' => 'Scoperta della Relatività',
                'description' => 'Nel 1905 Albert Einstein pubblica la teoria della relatività ristretta, rivoluzionando la fisica moderna. L’idea che spazio e tempo siano grandezze relative e interdipendenti rompe con la visione classica newtoniana e apre la strada a una nuova comprensione dell’universo. Il lavoro di Einstein segna l’inizio della fisica del XX secolo.',
                'year' => 1905,
                'period_id' => Period::where('name', 'Età Contemporanea')->first()->id,
                'image' => 'scoperta-relativita.jpg',
                'people' => ['Albert Einstein']
            ],
            [
                'title' => 'Relatività Generale',
                'description' => 'Nel 1915 Einstein presenta la teoria della relatività generale, ampliamento della relatività ristretta. La teoria descrive la gravità non come una forza, ma come una curvatura dello spazio-tempo causata dalla massa. Questo modello rivoluzionario permette di spiegare fenomeni come la precessione del perielio di Mercurio e predice l’esistenza delle onde gravitazionali.',
                'year' => 1915,
                'period_id' => Period::where('name', 'Età Contemporanea')->first()->id,
                'image' => 'relativita-generale.jpg',
                'people' => ['Albert Einstein']
            ],
            [
                'title' => 'Seconda Guerra Mondiale',
                'description' => 'Tra il 1939 e il 1945 il mondo è sconvolto dal più grande conflitto della storia. Nel 1940 Winston Churchill, divenuto primo ministro britannico, guida il Regno Unito nella resistenza contro le potenze dell’Asse. La sua leadership, caratterizzata da determinazione e oratoria straordinaria, contribuisce a mantenere alto il morale della popolazione durante i bombardamenti della Luftwaffe.',
                'year' => 1940,
                'period_id' => Period::where('name', 'Età Contemporanea')->first()->id,
                'image' => 'seconda-guerra-mondiale.jpg',
                'people' => ['Winston Churchill']
            ],
            [
                'title' => 'Battaglia d\'Inghilterra',
                'description' => 'Nel 1940 la Royal Air Force affronta la Luftwaffe nella Battaglia d’Inghilterra, primo grande scontro aereo della storia. Churchill guida la nazione con discorsi memorabili, mentre i piloti britannici difendono il Paese da un’invasione imminente. La vittoria britannica segna un punto di svolta nella guerra e dimostra l’importanza strategica del dominio dei cieli.',
                'year' => 1940,
                'period_id' => Period::where('name', 'Età Contemporanea')->first()->id,
                'image' => 'battaglia-inghilterra.jpg',
                'people' => ['Winston Churchill']
            ],

            // ===================== MEDIOEVO =====================
            [
                'title' => 'Coronazione di Carlo Magno',
                'description' => 'Il 25 dicembre dell’anno 800 Carlo Magno viene incoronato imperatore dei Romani da papa Leone III. L’evento sancisce la rinascita dell’idea imperiale in Occidente e segna l’inizio del Sacro Romano Impero. Carlo Magno promuove riforme amministrative, culturali e religiose, dando vita alla cosiddetta Rinascita Carolingia.',
                'year' => 800,
                'period_id' => Period::where('name', 'Medioevo')->first()->id,
                'image' => 'coronazione-carlo-magno.jpg',
                'people' => ['Carlo Magno']
            ],
            [
                'title' => 'Battaglia di Hastings',
                'description' => 'Nel 1066 Guglielmo il Conquistatore sconfigge il re anglosassone Harold II nella battaglia di Hastings, aprendo la strada alla conquista normanna dell’Inghilterra. L’evento trasforma profondamente la società inglese, introducendo nuove strutture politiche, militari e culturali. La battaglia è uno dei momenti più significativi della storia medievale europea.',
                'year' => 1066,
                'period_id' => Period::where('name', 'Medioevo')->first()->id,
                'image' => 'battaglia-hastings.jpg',
                'people' => ['Guglielmo il Conquistatore']
            ],
            [
                'title' => 'Prima Crociata',
                'description' => 'Nel 1099, al termine della Prima Crociata, i crociati conquistano Gerusalemme dopo una lunga e sanguinosa campagna. L’evento segna l’inizio della presenza latina in Terra Santa e rappresenta uno dei momenti più drammatici e controversi del Medioevo. La figura di Goffredo di Buglione emerge come simbolo della leadership crociata.',
                'year' => 1099,
                'period_id' => Period::where('name', 'Medioevo')->first()->id,
                'image' => 'prima-crociata.jpg',
                'people' => ['Goffredo di Buglione']
            ],
            [
                'title' => 'Magna Carta',
                'description' => 'Nel 1215 il re Giovanni d’Inghilterra è costretto a firmare la Magna Carta, documento che limita il potere monarchico e garantisce alcuni diritti fondamentali ai baroni. Considerata uno dei primi passi verso il costituzionalismo moderno, la Magna Carta rappresenta un simbolo della lotta contro l’arbitrio del potere e dell’affermazione delle libertà civili. Nel corso dei secoli, il suo valore simbolico è stato richiamato in numerosi contesti politici e giuridici, rendendola una pietra miliare nella storia del diritto occidentale.',
                'year' => 1215,
                'period_id' => Period::where('name', 'Medioevo')->first()->id,
                'image' => 'magna-carta.jpg',
                'people' => ['Giovanni Senzaterra']
            ],
            [
                'title' => 'Peste Nera',
                'description' => 'A partire dal 1347, la Peste Nera si diffonde rapidamente in Europa, causando la morte di una parte significativa della popolazione. La pandemia, probabilmente trasmessa attraverso le rotte commerciali, provoca conseguenze devastanti sul piano demografico, economico e sociale. Interi villaggi vengono abbandonati, le strutture produttive crollano e la percezione della fragilità umana di fronte alla malattia segna profondamente l’immaginario collettivo del Medioevo.',
                'year' => 1347,
                'period_id' => Period::where('name', 'Medioevo')->first()->id,
                'image' => 'peste-nera.jpg',
                'people' => []
            ],

        ];

        $translations = [
            "Scoperta dell'America" => [
                'en' => [
                    'title' => "Discovery of America",
                    'description' => 'In 1492 Christopher Columbus, a Genoese navigator in the service of the Crown of Castile, reached the shores of a new continent while seeking a western route to the Indies. The expedition of three caravels marked the start of European expansion into the New World, forever changing global economic, cultural and geopolitical balances.'
                ],
                'fr' => [
                    'title' => 'Découverte de l’Amérique',
                    'description' => 'En 1492, Christophe Colomb, navigateur génois au service de la Couronne de Castille, atteignit les côtes d’un nouveau continent en cherchant une route occidentale vers les Indes. L’expédition de trois caravelles marqua le début de l’expansion européenne dans le Nouveau Monde, modifiant à jamais les équilibres économiques, culturels et géopolitiques.'
                ]
            ],
            'Rinascimento Italiano' => [
                'en' => [
                    'title' => 'Italian Renaissance',
                    'description' => 'The Italian Renaissance, flourishing between the 15th and 16th centuries, represents a period of great artistic, cultural and scientific achievement. Cities like Florence, Rome and Milan became centers of innovation where artists, scientists and philosophers redefined beauty, proportion and knowledge.'
                ],
                'fr' => [
                    'title' => 'Renaissance italienne',
                    'description' => 'La Renaissance italienne, qui prospéra entre les XVe et XVIe siècles, représente une période de grand essor artistique, culturel et scientifique. Des villes comme Florence, Rome et Milan devinrent des centres d’innovation où artistes, scientifiques et philosophes redéfinirent la beauté, la proportion et le savoir.'
                ]
            ],
            'Pittura della Cappella Sistina' => [
                'en' => [
                    'title' => 'Painting of the Sistine Chapel',
                    'description' => 'Between 1508 and 1512 Michelangelo Buonarroti painted the ceiling of the Sistine Chapel, one of the masterpieces of Western art. Commissioned by Pope Julius II, the work presents a monumental vision of creation and humanity with expressive figures and complex composition.'
                ],
                'fr' => [
                    'title' => 'Peinture de la chapelle Sixtine',
                    'description' => 'Entre 1508 et 1512, Michel-Ange réalisa le plafond de la chapelle Sixtine, un des chefs-d’œuvre de l’art occidental. Commandée par le pape Jules II, l’œuvre offre une vision monumentale de la création et de l’humanité, avec des figures expressives et une composition complexe.'
                ]
            ],
            'Ultima Cena' => [
                'en' => [
                    'title' => 'The Last Supper',
                    'description' => 'Painted between 1494 and 1498 in Milan, Leonardo da Vinci’s Last Supper is one of the most studied masterpieces. Leonardo revolutionized iconography by capturing the dramatic moment when Christ announces the betrayal.'
                ],
                'fr' => [
                    'title' => 'La Cène',
                    'description' => 'Peinte entre 1494 et 1498 à Milan, La Cène de Léonard de Vinci est l’un des chefs-d’œuvre les plus étudiés. Léonard révolutionna l’iconographie en saisissant le moment dramatique où le Christ annonce la trahison.'
                ]
            ],
            'Progetto della Macchina Volante' => [
                'en' => [
                    'title' => 'Design of the Flying Machine',
                    'description' => 'In the early 16th century Leonardo studied human flight, analyzing birds and designing machines to imitate their dynamics. His drawings, including ornithopters and prototype aircraft, anticipated concepts developed centuries later.'
                ],
                'fr' => [
                    'title' => 'Projet de machine volante',
                    'description' => 'Au début du XVIe siècle, Léonard étudia le vol humain, analysa les oiseaux et conçut des machines pour imiter leurs dynamiques. Ses dessins, dont l’ornithoptère, anticipèrent des concepts développés des siècles plus tard.'
                ]
            ],
            'Viaggio verso le Indie' => [
                'en' => [
                    'title' => 'Voyage to the Indies',
                    'description' => 'In 1492 Columbus undertook his first voyage to the Indies under Queen Isabella’s patronage. Believing a western route to Asia was possible, he crossed the Atlantic and reached Caribbean islands, initiating systematic contact between Europe and the Americas.'
                ],
                'fr' => [
                    'title' => 'Voyage vers les Indes',
                    'description' => 'En 1492, Colomb entreprit son premier voyage vers les Indes sous le patronage de la reine Isabelle. Convaincu qu’une route occidentale vers l’Asie était possible, il traversa l’Atlantique et atteignit les îles des Caraïbes, initiant le contact systématique entre l’Europe et les Amériques.'
                ]
            ],
            'Invenzione del telescopio' => [
                'en' => [
                    'title' => 'Invention of the Telescope',
                    'description' => 'In 1609 Galileo Galilei refined the telescope, allowing unprecedented observations of the sky. His discoveries, like lunar mountains and Venus phases, revolutionized astronomy and challenged the geocentric view.'
                ],
                'fr' => [
                    'title' => 'Invention du télescope',
                    'description' => 'En 1609, Galilée perfectionna le télescope, permettant des observations célestes sans précédent. Ses découvertes, comme les montagnes lunaires et les phases de Vénus, révolutionnèrent l’astronomie et contestèrent la vision géocentrique.'
                ]
            ],
            'Scoperta dei satelliti di Giove' => [
                'en' => [
                    'title' => 'Discovery of Jupiter’s Satellites',
                    'description' => 'In 1610 Galileo observed four satellites orbiting Jupiter, now known as the Galilean moons. This observation provided strong evidence against the Aristotelian geocentric model.'
                ],
                'fr' => [
                    'title' => 'Découverte des satellites de Jupiter',
                    'description' => 'En 1610, Galilée observa quatre satellites en orbite autour de Jupiter, aujourd’hui appelés lunes galiléennes. Cette observation donna un argument fort contre le modèle géocentrique aristotélicien.'
                ]
            ],
            "Campagna d'Egitto" => [
                'en' => [
                    'title' => 'Egypt Campaign',
                    'description' => 'In 1798 Napoleon led an expedition to Egypt aiming to weaken British power and open new trade routes. The campaign led to the discovery of the Rosetta Stone and inaugurated modern Egyptology.'
                ],
                'fr' => [
                    'title' => 'Campagne d’Égypte',
                    'description' => 'En 1798, Napoléon mena une expédition en Égypte visant à affaiblir la puissance britannique et ouvrir de nouvelles voies commerciales. La campagne conduisit à la découverte de la pierre de Rosette et inaugura l’égyptologie moderne.'
                ]
            ],
            'Battaglia di Waterloo' => [
                'en' => [
                    'title' => 'Battle of Waterloo',
                    'description' => 'On June 18, 1815, near Waterloo, Napoleon’s forces faced the Anglo-Dutch army under the Duke of Wellington and Prussian troops. Napoleon’s defeat ended his era and ushered a new European order.'
                ],
                'fr' => [
                    'title' => 'Bataille de Waterloo',
                    'description' => 'Le 18 juin 1815, près de Waterloo, les forces de Napoléon affrontèrent l’armée anglo-néerlandaise dirigée par le duc de Wellington et les troupes prussiennes. La défaite de Napoléon mit fin à son époque et ouvrit la voie à un nouvel ordre européen.'
                ]
            ],
            'Fondazione di Roma' => [
                'en' => [
                    'title' => 'Founding of Rome',
                    'description' => 'According to tradition, in 753 BC Romulus founded the city of Rome on the Palatine Hill. While wrapped in myth, the founding marks the beginning of a civilization that would dominate the Mediterranean for centuries.'
                ],
                'fr' => [
                    'title' => 'Fondation de Rome',
                    'description' => 'Selon la tradition, en 753 av. J.-C., Romulus fonda la ville de Rome sur le mont Palatin. Bien que le récit soit mythique, la fondation marque le début d’une civilisation destinée à dominer la Méditerranée pendant des siècles.'
                ]
            ],
            'Assassinio di Giulio Cesare' => [
                'en' => [
                    'title' => 'Assassination of Julius Caesar',
                    'description' => 'On March 15, 44 BC, during a Senate session Julius Caesar was murdered by conspirators led by Brutus and Cassius. The event, the Ides of March, signaled the end of the Roman Republic and the rise of the Empire.'
                ],
                'fr' => [
                    'title' => 'Assassinat de Jules César',
                    'description' => 'Le 15 mars 44 av. J.-C., lors d’une séance du Sénat, Jules César fut assassiné par des conjurés conduits par Brutus et Cassius. L’événement, les Ides de mars, signa la fin de la République romaine et l’essor de l’Empire.'
                ]
            ],
            'Campagne di Alessandro Magno' => [
                'en' => [
                    'title' => 'Campaigns of Alexander the Great',
                    'description' => 'Between 334 and 323 BC Alexander led campaigns that conquered the Persian Empire and created one of the largest empires of antiquity, spreading Hellenistic culture across the Mediterranean and Near East.'
                ],
                'fr' => [
                    'title' => 'Campagnes d’Alexandre le Grand',
                    'description' => 'Entre 334 et 323 av. J.-C., Alexandre mena des campagnes qui conquirent l’Empire perse et créèrent l’un des plus vastes empires de l’Antiquité, diffusant la culture hellénistique à travers la Méditerranée et le Proche-Orient.'
                ]
            ],
            'Regno di Cleopatra' => [
                'en' => [
                    'title' => "Reign of Cleopatra",
                    'description' => 'Cleopatra VII ruled during a period of great political instability. A cultured and skilled strategist, she sought alliances with Julius Caesar and Mark Antony to preserve her kingdom’s independence.'
                ],
                'fr' => [
                    'title' => 'Règne de Cléopâtre',
                    'description' => 'Cléopâtre VII régna durant une période d’importante instabilité politique. Femme lettrée et stratège, elle chercha des alliances avec Jules César et Marc Antoine pour préserver l’indépendance de son royaume.'
                ]
            ],
            'Battaglia di Alesia' => [
                'en' => [
                    'title' => 'Battle of Alesia',
                    'description' => 'In 52 BC Julius Caesar faced Vercingetorix at Alesia. Through fortifications and strategy, Caesar achieved a decisive victory that consolidated Roman control over Gaul.'
                ],
                'fr' => [
                    'title' => 'Bataille d’Alesia',
                    'description' => 'En 52 av. J.-C., Jules César affronta Vercingétorix à Alésia. Grâce à des fortifications et une stratégie maîtrisée, César remporta une victoire décisive qui consolida la domination romaine sur la Gaule.'
                ]
            ],
            'Fondazione di Alessandria' => [
                'en' => [
                    'title' => 'Founding of Alexandria',
                    'description' => 'In 331 BC Alexander the Great founded Alexandria in Egypt, destined to become a major cultural center with the famous Library of Alexandria and a crossroads for scientific and commercial exchange.'
                ],
                'fr' => [
                    'title' => 'Fondation d’Alexandrie',
                    'description' => 'En 331 av. J.-C., Alexandre le Grand fonda Alexandrie en Égypte, destinée à devenir un grand centre culturel avec la fameuse bibliothèque et un carrefour d’échanges scientifiques et commerciaux.'
                ]
            ],
            'Scoperta della Relatività' => [
                'en' => [
                    'title' => 'Discovery of Relativity',
                    'description' => 'In 1905 Albert Einstein published the theory of special relativity, revolutionizing physics by proposing that space and time are relative and interconnected.'
                ],
                'fr' => [
                    'title' => 'Découverte de la relativité',
                    'description' => 'En 1905, Albert Einstein publia la théorie de la relativité restreinte, révolutionnant la physique en proposant que l’espace et le temps soient relatifs et interdépendants.'
                ]
            ],
            'Relatività Generale' => [
                'en' => [
                    'title' => 'General Relativity',
                    'description' => 'In 1915 Einstein presented the general theory of relativity, describing gravity as the curvature of spacetime caused by mass and predicting phenomena like gravitational waves.'
                ],
                'fr' => [
                    'title' => 'Relativité générale',
                    'description' => 'En 1915, Einstein présenta la théorie générale de la relativité, décrivant la gravité comme la courbure de l’espace-temps causée par la masse et prédisant des phénomènes tels que les ondes gravitationnelles.'
                ]
            ],
            'Seconda Guerra Mondiale' => [
                'en' => [
                    'title' => 'Second World War',
                    'description' => 'From 1939 to 1945 the world was engulfed in the largest conflict in history. Leaders like Winston Churchill played central roles in the Allied resistance and wartime governance.'
                ],
                'fr' => [
                    'title' => 'Seconde Guerre mondiale',
                    'description' => 'De 1939 à 1945, le monde fut plongé dans le plus grand conflit de l’histoire. Des dirigeants comme Winston Churchill jouèrent des rôles centraux dans la résistance alliée et la gestion de la guerre.'
                ]
            ],
            "Battaglia d'Inghilterra" => [
                'en' => [
                    'title' => 'Battle of Britain',
                    'description' => 'In 1940 the RAF faced the Luftwaffe in the Battle of Britain, a pivotal aerial conflict where British pilots defended the country and secured a crucial strategic victory.'
                ],
                'fr' => [
                    'title' => 'Bataille d’Angleterre',
                    'description' => 'En 1940, la RAF affronta la Luftwaffe lors de la bataille d’Angleterre, un affrontement aérien décisif où les pilotes britanniques défendirent le pays et obtinrent une victoire stratégique cruciale.'
                ]
            ],
            'Coronazione di Carlo Magno' => [
                'en' => [
                    'title' => 'Coronation of Charlemagne',
                    'description' => 'On December 25, year 800, Charlemagne was crowned Emperor by Pope Leo III, marking the revival of imperial authority in Western Europe and the beginning of the Carolingian Renaissance.'
                ],
                'fr' => [
                    'title' => 'Couronnement de Charlemagne',
                    'description' => 'Le 25 décembre 800, Charlemagne fut couronné empereur par le pape Léon III, marquant la renaissance de l’autorité impériale en Occident et le début de la Renaissance carolingienne.'
                ]
            ],
            'Battaglia di Hastings' => [
                'en' => [
                    'title' => 'Battle of Hastings',
                    'description' => 'In 1066 William the Conqueror defeated King Harold II at Hastings, leading to the Norman conquest of England and profound social and political changes.'
                ],
                'fr' => [
                    'title' => 'Bataille de Hastings',
                    'description' => 'En 1066, Guillaume le Conquérant vainquit le roi Harold II à Hastings, conduisant à la conquête normande de l’Angleterre et à d’importants changements sociaux et politiques.'
                ]
            ],
            'Prima Crociata' => [
                'en' => [
                    'title' => 'First Crusade',
                    'description' => 'In 1099 the First Crusade culminated with the capture of Jerusalem by crusaders, marking the beginning of Latin presence in the Holy Land and a dramatic episode of medieval history.'
                ],
                'fr' => [
                    'title' => 'Première croisade',
                    'description' => 'En 1099, la Première croisade aboutit à la prise de Jérusalem par les croisés, marquant le début de la présence latine en Terre Sainte et un épisode dramatique de l’histoire médiévale.'
                ]
            ],
            'Magna Carta' => [
                'en' => [
                    'title' => 'Magna Carta',
                    'description' => 'In 1215 King John of England was forced to sign the Magna Carta, a document limiting royal power and protecting certain baronial rights, becoming a milestone in the development of constitutional law.'
                ],
                'fr' => [
                    'title' => 'Magna Carta',
                    'description' => 'En 1215, le roi Jean d’Angleterre fut contraint de signer la Magna Carta, document limitant le pouvoir royal et protégeant certains droits des barons, devenant une étape importante du droit constitutionnel.'
                ]
            ],
            'Peste Nera' => [
                'en' => [
                    'title' => 'Black Death',
                    'description' => 'From 1347 the Black Death spread across Europe, causing massive mortality and profound demographic, economic and social consequences. Entire villages were abandoned and production systems collapsed.'
                ],
                'fr' => [
                    'title' => 'Peste noire',
                    'description' => 'À partir de 1347, la peste noire se répandit à travers l’Europe, causant une mortalité massive et des conséquences démographiques, économiques et sociales profondes. Des villages entiers furent abandonnés et les systèmes de production s’effondrèrent.'
                ]
            ],
        ];

        foreach ($events as $event) {
            $data = [
                'description' => $event['description'],
                'year' => $event['year'],
                'period_id' => $event['period_id'],
                'image' => $event['image'],
                'title_it' => $event['title'],
                'description_it' => $event['description'],
                'title_en' => array_key_exists($event['title'], $translations) ? $translations[$event['title']]['en']['title'] : $event['title'],
                'description_en' => array_key_exists($event['title'], $translations) ? $translations[$event['title']]['en']['description'] : $event['description'],
                'title_fr' => array_key_exists($event['title'], $translations) ? $translations[$event['title']]['fr']['title'] : $event['title'],
                'description_fr' => array_key_exists($event['title'], $translations) ? $translations[$event['title']]['fr']['description'] : $event['description'],
            ];

            $historicalEvent = HistoricalEvent::updateOrCreate(
                ['title' => $event['title']],
                $data
            );

            $personsIds = HistoricalPerson::whereIn('name', $event['people'])->pluck('id');
            if ($personsIds->isNotEmpty()) {
                $historicalEvent->historicalPeople()->sync($personsIds);
            }
        }
    }
}
