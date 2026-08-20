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
                'people' => ['Cristoforo Colombo']
            ],
            [
                'title' => 'Rinascimento Italiano',
                'description' => 'Il Rinascimento italiano, fiorito tra il XV e il XVI secolo, rappresenta una delle epoche di maggiore splendore artistico, culturale e scientifico della storia umana. In questo periodo, città come Firenze, Roma e Milano diventano centri di innovazione, dove artisti, scienziati e filosofi ridefiniscono i concetti di bellezza, proporzione e conoscenza. Le opere di Leonardo da Vinci e Michelangelo segnano un punto di svolta nella storia dell’arte, fondendo osservazione scientifica, tecnica magistrale e profondità spirituale.',
                'year' => 1500,
                'period_id' => Period::where('name', 'Rinascimento')->first()->id,
                'people' => ['Leonardo da Vinci', 'Michelangelo']
            ],
            [
                'title' => 'Pittura della Cappella Sistina',
                'description' => 'Tra il 1508 e il 1512 Michelangelo Buonarroti realizza il soffitto della Cappella Sistina, uno dei capolavori assoluti dell’arte occidentale. L’opera, commissionata da papa Giulio II, rappresenta una visione monumentale della creazione, dell’umanità e del rapporto tra uomo e divino. La potenza espressiva delle figure, la complessità della composizione e l’innovazione tecnica rendono la Sistina un punto di riferimento imprescindibile per la storia dell’arte.',
                'year' => 1512,
                'period_id' => Period::where('name', 'Rinascimento')->first()->id,
                'people' => ['Michelangelo']
            ],
            [
                'title' => 'Ultima Cena',
                'description' => 'Realizzata tra il 1494 e il 1498 nel refettorio di Santa Maria delle Grazie a Milano, l’Ultima Cena di Leonardo da Vinci è una delle opere più celebri e studiate della storia dell’arte. Leonardo rivoluziona la tradizione iconografica, rappresentando il momento drammatico in cui Cristo annuncia il tradimento. La composizione, la resa psicologica dei personaggi e l’uso innovativo della prospettiva conferiscono all’opera una forza narrativa senza precedenti.',
                'year' => 1498,
                'period_id' => Period::where('name', 'Rinascimento')->first()->id,
                'people' => ['Leonardo da Vinci']
            ],
            [
                'title' => 'Progetto della Macchina Volante',
                'description' => 'All’inizio del XVI secolo Leonardo da Vinci dedica numerosi studi al volo umano, analizzando il movimento degli uccelli e progettando macchine capaci di imitare le loro dinamiche. I suoi disegni, tra cui l’ornitottero e il celebre “aeroplano”, testimoniano una visione straordinariamente moderna, anticipando concetti che verranno sviluppati solo secoli dopo con l’avvento dell’aviazione. Sebbene mai realizzate, queste invenzioni rappresentano un simbolo dell’ingegno rinascimentale.',
                'year' => 1505,
                'period_id' => Period::where('name', 'Rinascimento')->first()->id,
                'people' => ['Leonardo da Vinci']
            ],
            [
                'title' => 'Viaggio verso le Indie',
                'description' => 'Nel 1492 Colombo intraprende il suo primo viaggio verso le Indie, sostenuto dalla regina Isabella di Castiglia. Convinto della possibilità di raggiungere l’Asia navigando verso occidente, Colombo attraversa l’Atlantico e raggiunge le isole dei Caraibi. Il viaggio inaugura una nuova era di esplorazioni, scambi e conflitti, segnando l’inizio del contatto sistematico tra Europa e Americhe.',
                'year' => 1492,
                'period_id' => Period::where('name', 'Rinascimento')->first()->id,
                'people' => ['Cristoforo Colombo']
            ],

            // ===================== ETÀ MODERNA =====================
            [
                'title' => 'Invenzione del telescopio',
                'description' => 'Nel 1609 Galileo Galilei perfeziona il telescopio, strumento che gli permette di osservare il cielo con una precisione mai raggiunta prima. Le sue scoperte, tra cui le montagne lunari e le fasi di Venere, rivoluzionano l’astronomia e mettono in crisi la visione geocentrica dell’universo. L’uso del telescopio segna l’inizio dell’osservazione scientifica moderna e contribuisce alla nascita della rivoluzione scientifica.',
                'year' => 1609,
                'period_id' => Period::where('name', 'Età Moderna')->first()->id,
                'people' => ['Galileo Galilei']
            ],
            [
                'title' => 'Scoperta dei satelliti di Giove',
                'description' => 'Nel 1610 Galileo Galilei osserva quattro satelliti orbitare attorno a Giove, oggi noti come satelliti medicei. Questa scoperta fornisce una prova fondamentale contro il modello geocentrico aristotelico, dimostrando che non tutti i corpi celesti ruotano attorno alla Terra. L’osservazione dei satelliti gioviani rappresenta una pietra miliare nella storia dell’astronomia e nella nascita della cosmologia moderna.',
                'year' => 1610,
                'period_id' => Period::where('name', 'Età Moderna')->first()->id,
                'people' => ['Galileo Galilei']
            ],
            [
                'title' => 'Campagna d\'Egitto',
                'description' => 'Nel 1798 Napoleone Bonaparte guida una vasta spedizione militare in Egitto con l’obiettivo di indebolire la potenza britannica e aprire nuove vie commerciali. La campagna, pur non raggiungendo gli obiettivi strategici, porta alla scoperta della Stele di Rosetta e inaugura l’egittologia moderna. L’incontro tra cultura europea e civiltà egizia genera un enorme interesse scientifico e archeologico.',
                'year' => 1798,
                'period_id' => Period::where('name', 'Età Moderna')->first()->id,
                'people' => ['Napoleone Bonaparte']
            ],
            [
                'title' => 'Battaglia di Waterloo',
                'description' => 'Il 18 giugno 1815, nei pressi del villaggio di Waterloo, le forze napoleoniche affrontano l’esercito anglo-olandese guidato dal duca di Wellington e le truppe prussiane del generale Blücher. La sconfitta segna la fine definitiva dell’epopea napoleonica e chiude un capitolo cruciale della storia europea, aprendo la strada a un nuovo equilibrio politico sancito dal Congresso di Vienna.',
                'year' => 1815,
                'period_id' => Period::where('name', 'Età Moderna')->first()->id,
                'people' => ['Napoleone Bonaparte']
            ],

            // ===================== ANTICHITÀ =====================
            [
                'title' => 'Fondazione di Roma',
                'description' => 'Secondo la tradizione, nel 753 a.C. Romolo fonda la città di Roma sul colle Palatino. Sebbene il racconto sia avvolto nel mito, la nascita di Roma rappresenta l’inizio di una civiltà destinata a dominare il Mediterraneo per secoli. La leggenda dei gemelli allevati dalla lupa simboleggia la forza, la resilienza e il destino imperiale della città.',
                'year' => -753,
                'period_id' => Period::where('name', 'Antichità')->first()->id,
                'people' => ['Romolo']
            ],
            [
                'title' => 'Assassinio di Giulio Cesare',
                'description' => 'Il 15 marzo del 44 a.C., durante una seduta del Senato, Giulio Cesare viene assassinato da un gruppo di congiurati guidati da Bruto e Cassio. L’evento, noto come le Idi di marzo, segna la fine della Repubblica romana e apre la strada alla nascita dell’Impero. La morte di Cesare rappresenta uno dei momenti più drammatici e simbolici della storia antica.',
                'year' => -44,
                'period_id' => Period::where('name', 'Antichità')->first()->id,
                'people' => ['Giulio Cesare']
            ],
            [
                'title' => 'Campagne di Alessandro Magno',
                'description' => 'Tra il 334 e il 323 a.C. Alessandro Magno conduce una serie di campagne militari che portano alla conquista dell’Impero persiano e alla creazione di uno dei più vasti imperi dell’antichità. La sua figura incarna l’ideale del sovrano guerriero, capace di unire strategia, carisma e ambizione. Le sue conquiste favoriscono la diffusione della cultura ellenistica in tutto il Mediterraneo e il Medio Oriente.',
                'year' => -330,
                'period_id' => Period::where('name', 'Antichità')->first()->id,
                'people' => ['Alessandro Magno']
            ],
            [
                'title' => 'Regno di Cleopatra',
                'description' => 'Cleopatra VII, ultima sovrana del Regno tolemaico d’Egitto, governa in un periodo di grande instabilità politica. Donna colta e stratega raffinata, tenta di preservare l’indipendenza dell’Egitto attraverso alleanze con Giulio Cesare e Marco Antonio. La sua figura, avvolta da fascino e leggenda, rappresenta uno degli esempi più celebri di leadership femminile dell’antichità.',
                'year' => -51,
                'period_id' => Period::where('name', 'Antichità')->first()->id,
                'people' => ['Cleopatra']
            ],
            [
                'title' => 'Battaglia di Alesia',
                'description' => 'Nel 52 a.C. Giulio Cesare affronta Vercingetorige nella battaglia di Alesia, uno degli scontri più celebri della guerra gallica. Grazie a un’imponente opera di fortificazioni e a una strategia magistrale, Cesare ottiene una vittoria decisiva che consolida il dominio romano sulla Gallia. L’episodio rappresenta un capolavoro di ingegneria militare e tattica bellica.',
                'year' => -52,
                'period_id' => Period::where('name', 'Antichità')->first()->id,
                'people' => ['Giulio Cesare']
            ],
            [
                'title' => 'Fondazione di Alessandria',
                'description' => 'Nel 331 a.C. Alessandro Magno fonda Alessandria d’Egitto, destinata a diventare uno dei più importanti centri culturali del mondo antico. La città ospiterà la celebre Biblioteca di Alessandria e diventerà un crocevia di scambi scientifici, filosofici e commerciali. La sua fondazione segna l’inizio dell’ellenismo in Egitto.',
                'year' => -331,
                'period_id' => Period::where('name', 'Antichità')->first()->id,
                'people' => ['Alessandro Magno']
            ],

            // ===================== ETÀ CONTEMPORANEA =====================
            [
                'title' => 'Scoperta della Relatività',
                'description' => 'Nel 1905 Albert Einstein pubblica la teoria della relatività ristretta, rivoluzionando la fisica moderna. L’idea che spazio e tempo siano grandezze relative e interdipendenti rompe con la visione classica newtoniana e apre la strada a una nuova comprensione dell’universo. Il lavoro di Einstein segna l’inizio della fisica del XX secolo.',
                'year' => 1905,
                'period_id' => Period::where('name', 'Età Contemporanea')->first()->id,
                'people' => ['Albert Einstein']
            ],
            [
                'title' => 'Relatività Generale',
                'description' => 'Nel 1915 Einstein presenta la teoria della relatività generale, ampliamento della relatività ristretta. La teoria descrive la gravità non come una forza, ma come una curvatura dello spazio-tempo causata dalla massa. Questo modello rivoluzionario permette di spiegare fenomeni come la precessione del perielio di Mercurio e predice l’esistenza delle onde gravitazionali.',
                'year' => 1915,
                'period_id' => Period::where('name', 'Età Contemporanea')->first()->id,
                'people' => ['Albert Einstein']
            ],
            [
                'title' => 'Seconda Guerra Mondiale',
                'description' => 'Tra il 1939 e il 1945 il mondo è sconvolto dal più grande conflitto della storia. Nel 1940 Winston Churchill, divenuto primo ministro britannico, guida il Regno Unito nella resistenza contro le potenze dell’Asse. La sua leadership, caratterizzata da determinazione e oratoria straordinaria, contribuisce a mantenere alto il morale della popolazione durante i bombardamenti della Luftwaffe.',
                'year' => 1940,
                'period_id' => Period::where('name', 'Età Contemporanea')->first()->id,
                'people' => ['Winston Churchill']
            ],
            [
                'title' => 'Battaglia d\'Inghilterra',
                'description' => 'Nel 1940 la Royal Air Force affronta la Luftwaffe nella Battaglia d’Inghilterra, primo grande scontro aereo della storia. Churchill guida la nazione con discorsi memorabili, mentre i piloti britannici difendono il Paese da un’invasione imminente. La vittoria britannica segna un punto di svolta nella guerra e dimostra l’importanza strategica del dominio dei cieli.',
                'year' => 1940,
                'period_id' => Period::where('name', 'Età Contemporanea')->first()->id,
                'people' => ['Winston Churchill']
            ],

            // ===================== MEDIOEVO =====================
            [
                'title' => 'Coronazione di Carlo Magno',
                'description' => 'Il 25 dicembre dell’anno 800 Carlo Magno viene incoronato imperatore dei Romani da papa Leone III. L’evento sancisce la rinascita dell’idea imperiale in Occidente e segna l’inizio del Sacro Romano Impero. Carlo Magno promuove riforme amministrative, culturali e religiose, dando vita alla cosiddetta Rinascita Carolingia.',
                'year' => 800,
                'period_id' => Period::where('name', 'Medioevo')->first()->id,
                'people' => ['Carlo Magno']
            ],
            [
                'title' => 'Battaglia di Hastings',
                'description' => 'Nel 1066 Guglielmo il Conquistatore sconfigge il re anglosassone Harold II nella battaglia di Hastings, aprendo la strada alla conquista normanna dell’Inghilterra. L’evento trasforma profondamente la società inglese, introducendo nuove strutture politiche, militari e culturali. La battaglia è uno dei momenti più significativi della storia medievale europea.',
                'year' => 1066,
                'period_id' => Period::where('name', 'Medioevo')->first()->id,
                'people' => ['Guglielmo il Conquistatore']
            ],
            [
                'title' => 'Prima Crociata',
                'description' => 'Nel 1099, al termine della Prima Crociata, i crociati conquistano Gerusalemme dopo una lunga e sanguinosa campagna. L’evento segna l’inizio della presenza latina in Terra Santa e rappresenta uno dei momenti più drammatici e controversi del Medioevo. La figura di Goffredo di Buglione emerge come simbolo della leadership crociata.',
                'year' => 1099,
                'period_id' => Period::where('name', 'Medioevo')->first()->id,
                'people' => ['Goffredo di Buglione']
            ],
            [
                'title' => 'Magna Carta',
                'description' => 'Nel 1215 il re Giovanni d’Inghilterra è costretto a firmare la Magna Carta, documento che limita il potere monarchico e garantisce alcuni diritti fondamentali ai baroni. Considerata uno dei primi passi verso il costituzionalismo moderno, la Magna Carta rappresenta un simbolo della lotta contro l’arbitrio del potere e dell’affermazione delle libertà civili. Nel corso dei secoli, il suo valore simbolico è stato richiamato in numerosi contesti politici e giuridici, rendendola una pietra miliare nella storia del diritto occidentale.',
                'year' => 1215,
                'period_id' => Period::where('name', 'Medioevo')->first()->id,
                'people' => ['Giovanni Senzaterra']
            ],
            [
                'title' => 'Peste Nera',
                'description' => 'A partire dal 1347, la Peste Nera si diffonde rapidamente in Europa, causando la morte di una parte significativa della popolazione. La pandemia, probabilmente trasmessa attraverso le rotte commerciali, provoca conseguenze devastanti sul piano demografico, economico e sociale. Interi villaggi vengono abbandonati, le strutture produttive crollano e la percezione della fragilità umana di fronte alla malattia segna profondamente l’immaginario collettivo del Medioevo.',
                'year' => 1347,
                'period_id' => Period::where('name', 'Medioevo')->first()->id,
                'people' => []
            ],

        ];

        foreach ($events as $event) {
            $historicalEvent = HistoricalEvent::updateOrCreate(
                ['title' => $event['title']],
                [
                    'description' => $event['description'],
                    'year' => $event['year'],
                    'period_id' => $event['period_id'],
                    'image' => null,
                ]
            );

            $personsIds = HistoricalPerson::whereIn('name', $event['people'])->pluck('id');
            if ($personsIds->isNotEmpty()) {
                $historicalEvent->historicalPeople()->sync($personsIds);
            }
        }
    }
}
