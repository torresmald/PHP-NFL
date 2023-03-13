<?php

namespace App\Controller;

use App\Entity\Team;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TeamsController extends AbstractController
{
    #[Route('/team/{id}', name:'showTeam')]
    public function showTeam(EntityManagerInterface $doctrine, $id)
    {
        $repository = $doctrine->getRepository(Team::class);
        $team = $repository->find($id);
        return $this->render('teams/showTeams.html.twig', ['team' => $team]);
    }
    #[Route('/teams', name: 'listTeams')]
    public function listTeams(EntityManagerInterface $doctrine)
    {
        $repository = $doctrine->getRepository(Team::class);
        $teams = $repository->findAll();

        return $this->render('teams/listTeams.html.twig', ['teams' => $teams]);
    }
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

        $doctrine->flush();

        return new Response('Equipos insertados');
    }
}
