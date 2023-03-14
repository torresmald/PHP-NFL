<?php

namespace App\Controller;

use App\Entity\Stadium;
use App\Entity\Team;
use App\Form\SearcherType;
use App\Form\TeamType;
use App\Manager\TeamManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class TeamsController extends AbstractController
{
    #[Route("/home", name:"home")]
    public function home(EntityManagerInterface $doctrine, Request $request){

        $form = $this-> createForm(SearcherType::class);
        $form-> handleRequest($request);
        if ($form-> isSubmitted() && $form-> isValid()) {
            $team = $form -> get('team')->getData();
            return $this -> redirectToRoute('showTeam', ['id'=>$team->getId()]);
        }

        $repository = $doctrine->getRepository(Team::class);
        $teams = $repository->findAll();

        return $this -> render("teams/home.html.twig", ['teams' => $teams, 'searchForm'=>$form]);
    }

    #[Route('/team/{id}', name: 'showTeam')]
    public function showTeam(EntityManagerInterface $doctrine, $id)
    {
        $repository = $doctrine->getRepository(Team::class);
        $team = $repository->find($id);
        return $this->render('teams/showTeams.html.twig', ['team' => $team]);
    }
    #[Route('/teams', name: 'listTeams')]
    public function listTeams(EntityManagerInterface $doctrine, Request $request)
    {
       
        $repository = $doctrine->getRepository(Team::class);
        $teams = $repository->findAll();
        return $this->render('teams/listTeams.html.twig', ['teams' => $teams]);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/insert/teams', name: 'insertTeams')]
    public function newTeam(EntityManagerInterface $doctrine)
    {
        $cardinals = new Team();
        $cardinals->setCode(1);
        $cardinals->setName('Arizona Cardinals');
        $cardinals->setCity('Glendale');
        $cardinals->setDivision('NFC West');
        $cardinals->setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/ARI');
        $cardinals->setEstablished('1920');
        $cardinals->setHeadCoach('Jonathan Gannon');
        $cardinals->setOwner('Michael Bidwill');

        $falcons = new Team();
        $falcons->setCode(2);
        $falcons->setName('Atlanta Falcons');
        $falcons->setCity('Atlanta');
        $falcons->setDivision('NFC West');
        $falcons->setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/ATL');
        $falcons->setEstablished('1966');
        $falcons->setHeadCoach('Arthur Smith');
        $falcons->setOwner('Arthur Blank');

        $panthers = new Team();
        $panthers->setCode(3);
        $panthers->setName('Carolina Panthers');
        $panthers->setCity('Charlotte');
        $panthers->setDivision('NFC West');
        $panthers->setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/CAR');
        $panthers->setEstablished('1955');
        $panthers->setHeadCoach('Frank Reich');
        $panthers->setOwner('David Tepper');

        $bears = new Team();
        $bears->setCode(4);
        $bears->setName('Chicago Bears');
        $bears->setCity('Chicago');
        $bears->setDivision('NFC West');
        $bears->setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/CHI');
        $bears->setEstablished('1920');
        $bears->setHeadCoach('Matt Eberflus');
        $bears->setOwner('Virginia Halas McCaskey');

        $cowboys = new Team();
        $cowboys->setCode(5);
        $cowboys->setName('Dallas Cowboys');
        $cowboys->setCity('Dallas');
        $cowboys->setDivision('NFC West');
        $cowboys->setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/DAL');
        $cowboys->setEstablished('1960');
        $cowboys->setHeadCoach('Mike McCarthy');
        $cowboys->setOwner('Jerry Jones');

        $lions = new Team();
        $lions->setCode(6);
        $lions->setName('Detroit Lions');
        $lions->setCity('Detroit');
        $lions->setDivision('NFC West');
        $lions->setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/DET');
        $lions->setEstablished('1930');
        $lions->setHeadCoach('Dan Campbell');
        $lions->setOwner('Sheila Ford Hamp');

        $packers = new Team();
        $packers->setCode(7);
        $packers->setName('Green Bay Packers');
        $packers->setCity('Green Bay');
        $packers->setDivision('NFC West');
        $packers->setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/GB');
        $packers->setEstablished('1921');
        $packers->setHeadCoach('Matt LaFleur');
        $packers->setOwner('Green Bay Packers, Inc.');

        $rams = new Team();
        $rams->setCode(8);
        $rams->setName('Los Angeles Rams');
        $rams->setCity('Los Angeles');
        $rams->setDivision('NFC West');
        $rams->setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/LA');
        $rams->setEstablished('1937');
        $rams->setHeadCoach('Sean McVay');
        $rams->setOwner('Stan Kroenke');

        $vikings = new Team();
        $vikings->setCode(9);
        $vikings->setName('Minnesota Vikings');
        $vikings->setCity('Mineapolis');
        $vikings->setDivision('NFC West');
        $vikings->setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/MIN');
        $vikings->setEstablished('1961');
        $vikings->setHeadCoach("Kevin O'Connell");
        $vikings->setOwner('Zygi Wilf');

        $saints = new Team();
        $saints->setCode(10);
        $saints->setName('New Orleans Saints');
        $saints->setCity('New Orleans');
        $saints->setDivision('NFC West');
        $saints->setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/NO');
        $saints->setEstablished('1967');
        $saints->setHeadCoach('Dennis Allen');
        $saints->setOwner('Gayle Benson');

        $giants = new Team();
        $giants->setCode(11);
        $giants->setName('New York Giants');
        $giants->setCity('New York');
        $giants->setDivision('NFC West');
        $giants->setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/NY');
        $giants->setEstablished('1925');
        $giants->setHeadCoach('Brian Daboll');
        $giants->setOwner('John Mara');

        $eagles = new Team();
        $eagles->setCode(12);
        $eagles->setName('Philadelphia Eagles');
        $eagles->setCity('Philadelphia');
        $eagles->setDivision('NFC West');
        $eagles->setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/PHI');
        $eagles->setEstablished('1933');
        $eagles->setHeadCoach('Nick Sirianni');
        $eagles->setOwner('Jeffrey Lurie');

        $sf49 = new Team();
        $sf49->setCode(13);
        $sf49->setName('San Francisco 49ers');
        $sf49->setCity('Santa Clara');
        $sf49->setDivision('NFC West');
        $sf49->setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/SF');
        $sf49->setEstablished('1946');
        $sf49->setHeadCoach('Kyle Shanahan');
        $sf49->setOwner('Jed York');

        $seahaws = new Team();
        $seahaws->setCode(14);
        $seahaws->setName('Seattle Seahaws');
        $seahaws->setCity('Seattle');
        $seahaws->setDivision('NFC West');
        $seahaws->setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/SEA');
        $seahaws->setEstablished('1976');
        $seahaws->setHeadCoach('Pete Carroll');
        $seahaws->setOwner('Seattle Seahawks Ownership Trust');

        $tampa = new Team();
        $tampa->setCode(15);
        $tampa->setName('Tampa Bay Buccaneers');
        $tampa->setCity('Tampa Bay');
        $tampa->setDivision('NFC West');
        $tampa->setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/TB');
        $tampa->setEstablished('1976');
        $tampa->setHeadCoach('Todd Bowles');
        $tampa->setOwner('Bryan Glazer, Edward Glazer, Joel Glazer');

        $washington = new Team();
        $washington->setCode(16);
        $washington->setName('Washington Commanders');
        $washington->setCity('Washington');
        $washington->setDivision('NFC West');
        $washington->setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/WAS');
        $washington->setEstablished('1932');
        $washington->setHeadCoach('Ron Rivera');
        $washington->setOwner('Dan Snyder');

        $ravens = new Team();
        $ravens->setCode(17);
        $ravens->setName('Baltimore Ravens');
        $ravens->setCity('Baltimore');
        $ravens->setDivision('AFC North');
        $ravens->setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/BAL');
        $ravens->setEstablished('1996');
        $ravens->setHeadCoach('John Harbaughg');
        $ravens->setOwner('Steve Bisciotti');

        $bills = new Team();
        $bills->setCode(18);
        $bills->setName('Buffalo Bills');
        $bills->setCity('Buffalo');
        $bills->setDivision('AFC East');
        $bills->setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/BUF');
        $bills->setEstablished('1960');
        $bills->setHeadCoach('Sean McDermott');
        $bills->setOwner('Kim and Terry Pegula');


        $bengals = new Team();
        $bengals->setCode(19);
        $bengals->setName('Cincinnati Bengals');
        $bengals->setCity('Cincinnati');
        $bengals->setDivision('AFC North');
        $bengals->setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/CIN');
        $bengals->setEstablished('1968');
        $bengals->setHeadCoach('Zac Taylor');
        $bengals->setOwner('Mike Brown');

        $browns = new Team();
        $browns->setCode(20);
        $browns->setName('Cleveland Browns');
        $browns->setCity('Cleveland');
        $browns->setDivision('AFC North');
        $browns->setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/CLE');
        $browns->setEstablished('1946');
        $browns->setHeadCoach('Kevin Stefanski');
        $browns->setOwner('Dee and Jimmy Haslam');

        $broncos = new Team();
        $broncos->setCode(21);
        $broncos->setName('Denver Broncos');
        $broncos->setCity('Denver');
        $broncos->setDivision('AFC West');
        $broncos->setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/DEN');
        $broncos->setEstablished('1960');
        $broncos->setHeadCoach('Sean Payton');
        $broncos->setOwner('Walton-Penner Family Ownership Group');

        $texans = new Team();
        $texans->setCode(22);
        $texans->setName('Houston Texans');
        $texans->setCity('Houston');
        $texans->setDivision('AFC South');
        $texans->setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/HOU');
        $texans->setEstablished('2002');
        $texans->setHeadCoach('DeMeco Ryans');
        $texans->setOwner('Janice S. McNair');

        $colts = new Team();
        $colts->setCode(23);
        $colts->setName('Indianapolis Colts');
        $colts->setCity('Indianapolis');
        $colts->setDivision('AFC South');
        $colts->setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/IND');
        $colts->setEstablished('1944');
        $colts->setHeadCoach('Shane Steichen');
        $colts->setOwner('Jim Irsay');

        $jaguars = new Team();
        $jaguars->setCode(24);
        $jaguars->setName('Jacksonville Jaguars');
        $jaguars->setCity('Jacksonville');
        $jaguars->setDivision('AFC South');
        $jaguars->setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/JAX');
        $jaguars->setEstablished('1995');
        $jaguars->setHeadCoach('Doug Pederson');
        $jaguars->setOwner('Shahid Khan');

        $chiefs = new Team();
        $chiefs->setCode(25);
        $chiefs->setName('Kansas City Chiefs');
        $chiefs->setCity('Kansas City');
        $chiefs->setDivision('AFC West');
        $chiefs->setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/KC');
        $chiefs->setEstablished('1960');
        $chiefs->setHeadCoach('Andy Reid');
        $chiefs->setOwner('Clark Hunt');

        $raiders = new Team();
        $raiders->setCode(26);
        $raiders->setName('Las Vegas Raiders');
        $raiders->setCity('Las Vegas');
        $raiders->setDivision('AFC West');
        $raiders->setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/LV');
        $raiders->setEstablished('1960');
        $raiders->setHeadCoach('Josh McDaniels');
        $raiders->setOwner('Carol and Mark Davis');

        $chargers = new Team();
        $chargers->setCode(27);
        $chargers->setName('Los Angeles Chargers');
        $chargers->setCity('Los Angeles');
        $chargers->setDivision('AFC West');
        $chargers->setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/LAC');
        $chargers->setEstablished('1960');
        $chargers->setHeadCoach('Brandon Staley');
        $chargers->setOwner('Alex Spanos and Family');

        $dolphins = new Team();
        $dolphins->setCode(28);
        $dolphins->setName('Miami Dolphins');
        $dolphins->setCity('Miami');
        $dolphins->setDivision('AFC East');
        $dolphins->setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/MIA');
        $dolphins->setEstablished('1966');
        $dolphins->setHeadCoach('Mike McDaniel');
        $dolphins->setOwner('Stephen M. Ross');

        $patriots = new Team();
        $patriots->setCode(29);
        $patriots->setName('New England Patriots');
        $patriots->setCity('Foxborough');
        $patriots->setDivision('AFC East');
        $patriots->setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/NE');
        $patriots->setEstablished('1960');
        $patriots->setHeadCoach('Bill Belichick');
        $patriots->setOwner('Robert Kraft');

        $jets = new Team();
        $jets->setCode(30);
        $jets->setName('New York Jets');
        $jets->setCity('New York');
        $jets->setDivision('AFC East');
        $jets->setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/NYJ');
        $jets->setEstablished('1960');
        $jets->setHeadCoach('Robert Saleh');
        $jets->setOwner('Robert Wood Johnson IV');

        $steelers = new Team();
        $steelers->setCode(31);
        $steelers->setName('Pittsburgh Steelers');
        $steelers->setCity('Pittsburgh');
        $steelers->setDivision('AFC North');
        $steelers->setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/PIT');
        $steelers->setEstablished('1933');
        $steelers->setHeadCoach('Mike Tomlin');
        $steelers->setOwner('Art Rooney II and Family');

        $titans = new Team();
        $titans->setCode(32);
        $titans->setName('Tennessee Titans');
        $titans->setCity('Tennessee');
        $titans->setDivision('AFC South');
        $titans->setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/TEN');
        $titans->setEstablished('1960');
        $titans->setHeadCoach('Mike Vrabel');
        $titans->setOwner('Amy Adams Strunk');


        $bearsStadium = new Stadium();
        $bearsStadium->setName('Soldier Field');
        $bearsStadium->setLink('https://en.wikipedia.org/wiki/Soldier_Field');
        $bearsStadium->setImage('https://upload.wikimedia.org/wikipedia/en/thumb/c/c4/Soldier_Field_Logo.svg/400px-Soldier_Field_Logo.svg.png');
        $bears->addStadium($bearsStadium);

        $bengalsStadium = new Stadium();
        $bengalsStadium->setName('Paycor Stadium');
        $bengalsStadium->setLink('https://en.wikipedia.org/wiki/Paycor_Stadium');
        $bengalsStadium->setImage('https://upload.wikimedia.org/wikipedia/en/thumb/7/73/Paycor_Stadium_logo.svg/400px-Paycor_Stadium_logo.svg.png');
        $bengals->addStadium($bengalsStadium);

        $billsStadium = new Stadium();
        $billsStadium->setName('Highmark Stadium');
        $billsStadium->setLink('https://en.wikipedia.org/wiki/Highmark_Stadium_(New_York)');
        $billsStadium->setImage('https://upload.wikimedia.org/wikipedia/en/thumb/a/a3/Highmark_Stadium_%28New_York%29_logo.svg/440px-Highmark_Stadium_%28New_York%29_logo.svg.png');
        $bills->addStadium($billsStadium);

        $broncosStadium = new Stadium();
        $broncosStadium->setName('Empower Field at Mile High');
        $broncosStadium->setLink('https://en.wikipedia.org/wiki/Empower_Field_at_Mile_High');
        $broncosStadium->setImage('https://upload.wikimedia.org/wikipedia/en/thumb/f/f2/Empower_Field_logo.svg/300px-Empower_Field_logo.svg.png');
        $broncos->addStadium($broncosStadium);

        $brownsStadium = new Stadium();
        $brownsStadium->setName('FirstEnergy Stadium');
        $brownsStadium->setLink('https://en.wikipedia.org/wiki/FirstEnergy_Stadium');
        $brownsStadium->setImage('https://upload.wikimedia.org/wikipedia/commons/thumb/c/c0/Firstenergy_stadium_logo_image.svg/400px-Firstenergy_stadium_logo_image.svg.png');
        $browns->addStadium($brownsStadium);

        $cardinalsStadium = new Stadium();
        $cardinalsStadium->setName('State Farm Stadium');
        $cardinalsStadium->setLink('https://en.wikipedia.org/wiki/State_Farm_Stadium');
        $cardinalsStadium->setImage('https://upload.wikimedia.org/wikipedia/commons/thumb/d/d6/State_Farm_Stadium_logo.svg/440px-State_Farm_Stadium_logo.svg.png');
        $cardinals->addStadium($cardinalsStadium);

        $chargersStadium = new Stadium();
        $chargersStadium->setName('SoFi Stadium');
        $chargersStadium->setLink('https://en.wikipedia.org/wiki/SoFi_Stadium');
        $chargersStadium->setImage('https://upload.wikimedia.org/wikipedia/commons/thumb/5/55/SoFi_Stadium_Logo.svg/400px-SoFi_Stadium_Logo.svg.png');
        $chargers->addStadium($chargersStadium);

        $chiefsStadium = new Stadium();
        $chiefsStadium->setName('Arrowhead Stadium');
        $chiefsStadium->setLink('https://en.wikipedia.org/wiki/Arrowhead_Stadium');
        $chiefsStadium->setImage('https://upload.wikimedia.org/wikipedia/commons/thumb/7/77/GEHA_Field_at_Arrowhead.svg/400px-GEHA_Field_at_Arrowhead.svg.png');
        $chiefs->addStadium($chiefsStadium);

        $coltsStadium = new Stadium();
        $coltsStadium->setName('Lucas Oil Stadium');
        $coltsStadium->setLink('https://en.wikipedia.org/wiki/Lucas_Oil_Stadium');
        $coltsStadium->setImage('https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/Lucas_Oil_Stadium_logo.svg/400px-Lucas_Oil_Stadium_logo.svg.png');
        $colts->addStadium($coltsStadium);

        $cowboysStadium = new Stadium();
        $cowboysStadium->setName('AT&T Stadium');
        $cowboysStadium->setLink('https://en.wikipedia.org/wiki/AT%26T_Stadium');
        $cowboysStadium->setImage('https://upload.wikimedia.org/wikipedia/commons/thumb/b/b9/At%26t_stadium_texas_logo.png/300px-At%26t_stadium_texas_logo.png');
        $cowboys->addStadium($cowboysStadium);

        $dolphinsStadium = new Stadium();
        $dolphinsStadium->setName('Hard Rock Stadium');
        $dolphinsStadium->setLink('https://en.wikipedia.org/wiki/Hard_Rock_Stadium');
        $dolphinsStadium->setImage('https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Hard_rock_stadium_florida_logo.svg/300px-Hard_rock_stadium_florida_logo.svg.png');
        $dolphins->addStadium($dolphinsStadium);

        $eaglesStadium = new Stadium();
        $eaglesStadium->setName('Lincoln Financial Field');
        $eaglesStadium->setLink('https://en.wikipedia.org/wiki/Lincoln_Financial_Field');
        $eaglesStadium->setImage('https://upload.wikimedia.org/wikipedia/en/thumb/5/50/Lincoln_Financial_Field_logo.svg/400px-Lincoln_Financial_Field_logo.svg.png');
        $eagles->addStadium($eaglesStadium);

        $falconsStadium = new Stadium();
        $falconsStadium->setName('Mercedes-Benz Stadium');
        $falconsStadium->setLink('https://en.wikipedia.org/wiki/Mercedes-Benz_Stadium');
        $falconsStadium->setImage('https://upload.wikimedia.org/wikipedia/en/thumb/e/ed/Mercedes-Benz_Stadium_logo.svg/300px-Mercedes-Benz_Stadium_logo.svg.png');
        $falcons->addStadium($falconsStadium);

        $giantsStadium = new Stadium();
        $giantsStadium->setName('MetLife Stadium');
        $giantsStadium->setLink('https://en.wikipedia.org/wiki/MetLife_Stadium');
        $giantsStadium->setImage('https://upload.wikimedia.org/wikipedia/en/thumb/d/d0/Metlife_Stadium_Logo.svg/300px-Metlife_Stadium_Logo.svg.png');
        $giants->addStadium($giantsStadium);

        $jaguarsStadium = new Stadium();
        $jaguarsStadium->setName('TIAA Bank Field');
        $jaguarsStadium->setLink('https://en.wikipedia.org/wiki/TIAA_Bank_Field');
        $jaguarsStadium->setImage('https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/Tiaa_bank_field_jacksonville_logo.png/400px-Tiaa_bank_field_jacksonville_logo.png');
        $jaguars->addStadium($jaguarsStadium);

        $jetsStadium = new Stadium();
        $jetsStadium->setName('MetLife Stadium');
        $jetsStadium->setLink('https://en.wikipedia.org/wiki/MetLife_Stadium');
        $jetsStadium->setImage('https://upload.wikimedia.org/wikipedia/en/thumb/d/d0/Metlife_Stadium_Logo.svg/300px-Metlife_Stadium_Logo.svg.png');
        $jets->addStadium($jetsStadium);

        $lionsStadium = new Stadium();
        $lionsStadium->setName('Ford Field');
        $lionsStadium->setLink('https://en.wikipedia.org/wiki/Ford_Field');
        $lionsStadium->setImage('https://upload.wikimedia.org/wikipedia/commons/thumb/7/78/Ford_field_stadium_logo.svg/400px-Ford_field_stadium_logo.svg.png');
        $lions->addStadium($lionsStadium);

        $packersStadium = new Stadium();
        $packersStadium->setName('Lambeau Field');
        $packersStadium->setLink('https://en.wikipedia.org/wiki/Lambeau_Field');
        $packersStadium->setImage('https://upload.wikimedia.org/wikipedia/en/thumb/7/77/Lambeau_Field_logo.svg/400px-Lambeau_Field_logo.svg.png');
        $packers->addStadium($packersStadium);

        $panthersStadium = new Stadium();
        $panthersStadium->setName('Bank of America Stadium');
        $panthersStadium->setLink('https://en.wikipedia.org/wiki/Bank_of_America_Stadium');
        $panthersStadium->setImage('https://upload.wikimedia.org/wikipedia/commons/thumb/c/ce/Bank_of_America_Stadium_logo.png/440px-Bank_of_America_Stadium_logo.png');
        $panthers->addStadium($panthersStadium);

        $patriotsStadium = new Stadium();
        $patriotsStadium->setName('Gillette Stadium');
        $patriotsStadium->setLink('https://en.wikipedia.org/wiki/Gillette_Stadium');
        $patriotsStadium->setImage('https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Gilette_Stadium_Logo.svg/400px-Gilette_Stadium_Logo.svg.png');
        $patriots->addStadium($patriotsStadium);

        $raidersStadium = new Stadium();
        $raidersStadium->setName('Allegiant Stadium');
        $raidersStadium->setLink('https://en.wikipedia.org/wiki/Allegiant_Stadium');
        $raidersStadium->setImage('https://upload.wikimedia.org/wikipedia/commons/thumb/1/10/Allegiant_stadium_logo_image.svg/400px-Allegiant_stadium_logo_image.svg.png');
        $raiders->addStadium($raidersStadium);

        $ramsStadium = new Stadium();
        $ramsStadium->setName('SoFi Stadium');
        $ramsStadium->setLink('https://en.wikipedia.org/wiki/SoFi_Stadium');
        $ramsStadium->setImage('https://upload.wikimedia.org/wikipedia/commons/thumb/5/55/SoFi_Stadium_Logo.svg/400px-SoFi_Stadium_Logo.svg.png');
        $rams->addStadium($ramsStadium);

        $ravensStadium = new Stadium();
        $ravensStadium->setName('M&T Bank Stadium');
        $ravensStadium->setLink('https://en.wikipedia.org/wiki/M%26T_Bank_Stadium');
        $ravensStadium->setImage('https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/M%26T_Bank_Stadium_Logo.svg/300px-M%26T_Bank_Stadium_Logo.svg.png');
        $ravens->addStadium($ravensStadium);

        $saintsStadium = new Stadium();
        $saintsStadium->setName('Caesars Superdome');
        $saintsStadium->setLink('https://en.wikipedia.org/wiki/Caesars_Superdome');
        $saintsStadium->setImage('https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/Caesars_Superdome_logo.svg/440px-Caesars_Superdome_logo.svg.png');
        $saints->addStadium($saintsStadium);

        $seahawsStadium = new Stadium();
        $seahawsStadium->setName('Lumen Field');
        $seahawsStadium->setLink('https://en.wikipedia.org/wiki/Lumen_Field');
        $seahawsStadium->setImage('https://upload.wikimedia.org/wikipedia/commons/thumb/b/ba/Lumen_Field_logo.svg/300px-Lumen_Field_logo.svg.png');
        $seahaws->addStadium($seahawsStadium);

        $sf49Stadium = new Stadium();
        $sf49Stadium->setName("Levi's Stadium");
        $sf49Stadium->setLink('https://en.wikipedia.org/wiki/Levi%27s_Stadium');
        $sf49Stadium->setImage('https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Levi%27s_Stadium_Logo.svg/400px-Levi%27s_Stadium_Logo.svg.png');
        $sf49->addStadium($sf49Stadium);

        $steelersStadium = new Stadium();
        $steelersStadium->setName('Acrisure Stadium');
        $steelersStadium->setLink('https://en.wikipedia.org/wiki/Acrisure_Stadium');
        $steelersStadium->setImage('https://upload.wikimedia.org/wikipedia/commons/thumb/f/f0/Acrisure_Stadium_logo.svg/300px-Acrisure_Stadium_logo.svg.png');
        $steelers->addStadium($steelersStadium);

        $tampaStadium = new Stadium();
        $tampaStadium->setName('Raymond James Stadium');
        $tampaStadium->setLink('https://en.wikipedia.org/wiki/Raymond_James_Stadium');
        $tampaStadium->setImage('https://upload.wikimedia.org/wikipedia/commons/thumb/5/50/Raymond_James_Stadium_logo.svg/440px-Raymond_James_Stadium_logo.svg.png');
        $tampa->addStadium($tampaStadium);

        $texansStadium = new Stadium();
        $texansStadium->setName('NRG Stadium');
        $texansStadium->setLink('https://en.wikipedia.org/wiki/NRG_Stadium');
        $texansStadium->setImage('https://upload.wikimedia.org/wikipedia/commons/thumb/d/da/NRG_Stadium_Logo.svg/300px-NRG_Stadium_Logo.svg.png');
        $texans->addStadium($texansStadium);

        $titansStadium = new Stadium();
        $titansStadium->setName('Nissan Stadium');
        $titansStadium->setLink('https://en.wikipedia.org/wiki/Nissan_Stadium');
        $titansStadium->setImage('https://upload.wikimedia.org/wikipedia/commons/thumb/d/d1/Nissan_Stadium_Logo.svg/400px-Nissan_Stadium_Logo.svg.png');
        $titans->addStadium($titansStadium);

        $vikingsStadium = new Stadium();
        $vikingsStadium->setName('U.S. Bank Stadium');
        $vikingsStadium->setLink('https://en.wikipedia.org/wiki/U.S._Bank_Stadium');
        $vikingsStadium->setImage('https://upload.wikimedia.org/wikipedia/commons/thumb/7/76/US_bank_stadium_minnesota_logo.svg/440px-US_bank_stadium_minnesota_logo.svg.png');
        $vikings->addStadium($vikingsStadium);

        $washingtonStadium = new Stadium();
        $washingtonStadium->setName('FedExField');
        $washingtonStadium->setLink('https://en.wikipedia.org/wiki/FedExField');
        $washingtonStadium->setImage('https://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/FedExField_logo.svg/400px-FedExField_logo.svg.png');
        $washington->addStadium($washingtonStadium);

        $doctrine->persist($bears);
        $doctrine->persist($bengals);
        $doctrine->persist($bills);
        $doctrine->persist($broncos);
        $doctrine->persist($browns);
        $doctrine->persist($cardinals);
        $doctrine->persist($chargers);
        $doctrine->persist($chiefs);
        $doctrine->persist($colts);
        $doctrine->persist($cowboys);
        $doctrine->persist($dolphins);
        $doctrine->persist($eagles);
        $doctrine->persist($falcons);
        $doctrine->persist($giants);
        $doctrine->persist($jaguars);
        $doctrine->persist($jets);
        $doctrine->persist($lions);
        $doctrine->persist($packers);
        $doctrine->persist($panthers);
        $doctrine->persist($patriots);
        $doctrine->persist($raiders);
        $doctrine->persist($rams);
        $doctrine->persist($ravens);
        $doctrine->persist($saints);
        $doctrine->persist($seahaws);
        $doctrine->persist($sf49);
        $doctrine->persist($steelers);
        $doctrine->persist($tampa);
        $doctrine->persist($texans);
        $doctrine->persist($titans);
        $doctrine->persist($vikings);
        $doctrine->persist($washington);

        $doctrine->persist($bearsStadium);
        $doctrine->persist($bengalsStadium);
        $doctrine->persist($billsStadium);
        $doctrine->persist($broncosStadium);
        $doctrine->persist($brownsStadium);
        $doctrine->persist($cardinalsStadium);
        $doctrine->persist($chargersStadium);
        $doctrine->persist($chiefsStadium);
        $doctrine->persist($coltsStadium);
        $doctrine->persist($cowboysStadium);
        $doctrine->persist($dolphinsStadium);
        $doctrine->persist($eaglesStadium);
        $doctrine->persist($falconsStadium);
        $doctrine->persist($giantsStadium);
        $doctrine->persist($jaguarsStadium);
        $doctrine->persist($jetsStadium);
        $doctrine->persist($lionsStadium);
        $doctrine->persist($packersStadium);
        $doctrine->persist($panthersStadium);
        $doctrine->persist($patriotsStadium);
        $doctrine->persist($raidersStadium);
        $doctrine->persist($ramsStadium);
        $doctrine->persist($ravensStadium);
        $doctrine->persist($saintsStadium);
        $doctrine->persist($seahawsStadium);
        $doctrine->persist($sf49Stadium);
        $doctrine->persist($steelersStadium);
        $doctrine->persist($tampaStadium);
        $doctrine->persist($texansStadium);
        $doctrine->persist($titansStadium);
        $doctrine->persist($vikingsStadium);
        $doctrine->persist($washingtonStadium);

        $doctrine->flush();

        return new Response('Equipos insertados');
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/insert/team', name: 'insertTeam')]
    public function insertTeam(Request $request, EntityManagerInterface $doctrine, TeamManager $manager)
    {
        $form = $this->createForm(TeamType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $team = $form->getData();
            $fileImage = $form->get('logoImage')->getData();
            if ($fileImage) {
                $teamImage = $manager->load($fileImage, $this->getParameter('kernel.project_dir') . '/public/asset/image');
                $team->setLogo('/asset/image/' . $teamImage);
            }
            $doctrine->persist($team);
            $doctrine->flush();
            $this->addFlash('success', 'Team created succesfully');
            return $this->redirectToRoute('listTeams');
        }
        return $this->renderForm('teams/createTeams.html.twig', [
            'form' => $form
        ]);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/edit/team/{id}', name: 'editTeam')]
    public function editTeam(Request $request, EntityManagerInterface $doctrine, $id)
    {
        $repository = $doctrine->getRepository(Team::class);
        $team = $repository->find($id);
        $form = $this->createForm(TeamType::class, $team);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $team = $form->getData();
            $doctrine->persist($team);
            $doctrine->flush();
            $this->addFlash('success', 'Team edited succesfully');
            return $this->redirectToRoute('listTeams');
        }
        return $this->renderForm('teams/createTeams.html.twig', [
            'form' => $form
        ]);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/delete/team/{id}', name: 'deleteTeam')]
    public function deleteTeam(EntityManagerInterface $doctrine, $id)
    {
        $repository = $doctrine->getRepository(Team::class);
        $team = $repository->find($id);
        $doctrine->remove($team);
        $doctrine->flush();
        $this->addFlash('success', 'Team deleted succesfully');
        return $this->redirectToRoute('listTeams');
    }
}
