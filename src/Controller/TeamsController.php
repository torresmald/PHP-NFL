<?php

namespace App\Controller;

use App\Entity\Team;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TeamsController extends AbstractController
{
    #[Route('/team')]
    public function showTeam()
    {
        $team = [
            'code' => '1',
            'name' => 'KC Chiefs',
            'city' => 'Kansas City',
            'division' => 'NFC West',
            'logo' => 'https://static.www.nfl.com/image/private/f_auto/league/u9fltoslqdsyao8cpm0k',
            'established' => 1920,
            'headCoach' => 'Jonathan Gannon',
            'owner' => 'Prueba'
        ];
        return $this->render('teams/showTeams.html.twig', ['team' => $team]);
    }
    #[Route('/teams', name: 'listTeams')]
    public function listTeams()
    {
        $teams =
            [
                [
                    'code' => '1',
                    'name' => 'KC Chiefs',
                    'city' => 'Kansas City',
                    'logo' => 'https://static.www.nfl.com/image/private/f_auto/league/u9fltoslqdsyao8cpm0k',
                    'established' => 1920,
                    'headCoach' => 'Jonathan Gannon'
                ],
                [
                    'code' => '2',
                    'name' => 'New England Patriots',
                    'city' => 'Foxborough',
                    'logo' => 'https://static.www.nfl.com/image/private/f_auto/league/u9fltoslqdsyao8cpm0k',
                    'established' => 1920,
                    'headCoach' => 'Jonathan Gannon'
                ]
            ];

        return $this->render('teams/listTeams.html.twig', ['teams' => $teams]);
    }
    #[Route('/new/team')]
    public function newTeam(EntityManagerInterface $doctrine)
    {
        $cardinals = new Team();
        $cardinals -> setCode(1);
        $cardinals -> setName('Arizona Cardinals');
        $cardinals -> setCity('Glendale');
        $cardinals -> setDivision('NFC West');
        $cardinals -> setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/ARI');
        $cardinals -> setEstablished('1920');
        $cardinals -> setHeadCoach('Jonathan Gannon');
        $cardinals -> setOwner('Michael Bidwill');

        $falcons = new Team();
        $falcons -> setCode(2);
        $falcons -> setName('Atlanta Falcons');
        $falcons -> setCity('Atlanta');
        $falcons -> setDivision('NFC West');
        $falcons -> setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/ATL');
        $falcons -> setEstablished('1966');
        $falcons -> setHeadCoach('Arthur Smith');
        $falcons -> setOwner('Arthur Blank');

        $panthers = new Team();
        $panthers -> setCode(3);
        $panthers -> setName('Carolina Panthers');
        $panthers -> setCity('Charlotte');
        $panthers -> setDivision('NFC West');
        $panthers -> setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/CAR');
        $panthers -> setEstablished('1955');
        $panthers -> setHeadCoach('Frank Reich');
        $panthers -> setOwner('David Tepper');

        $bears = new Team();
        $bears-> setCode(4);
        $bears -> setName('Chicago Bears');
        $bears -> setCity('Chicago');
        $bears -> setDivision('NFC West');
        $bears -> setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/CHI');
        $bears -> setEstablished('1920');
        $bears -> setHeadCoach('Matt Eberflus');
        $bears-> setOwner('Virginia Halas McCaskey');

        $cowboys = new Team();
        $cowboys-> setCode(5);
        $cowboys -> setName('Dallas Cowboys');
        $cowboys -> setCity('Dallas');
        $cowboys -> setDivision('NFC West');
        $cowboys -> setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/DAL');
        $cowboys -> setEstablished('1960');
        $cowboys -> setHeadCoach('Mike McCarthy');
        $cowboys-> setOwner('Jerry Jones');

        $lions = new Team();
        $lions-> setCode(6);
        $lions -> setName('Detroit Lions');
        $lions -> setCity('Detroit');
        $lions -> setDivision('NFC West');
        $lions -> setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/DET');
        $lions -> setEstablished('1930');
        $lions -> setHeadCoach('Dan Campbell');
        $lions-> setOwner('Sheila Ford Hamp');

        $packers = new Team();
        $packers-> setCode(7);
        $packers -> setName('Green Bay Packers');
        $packers -> setCity('Green Bay');
        $packers -> setDivision('NFC West');
        $packers -> setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/GB');
        $packers -> setEstablished('1921');
        $packers -> setHeadCoach('Matt LaFleur');
        $packers-> setOwner('Green Bay Packers, Inc.');

        $rams = new Team();
        $rams-> setCode(8);
        $rams -> setName('Los Angeles Rams');
        $rams -> setCity('Los Angeles');
        $rams -> setDivision('NFC West');
        $rams -> setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/LA');
        $rams -> setEstablished('1937');
        $rams -> setHeadCoach('Sean McVay');
        $rams-> setOwner('Stan Kroenke');

        $vikings = new Team();
        $vikings-> setCode(9);
        $vikings -> setName('Minnesota Vikings');
        $vikings -> setCity('Mineapolis');
        $vikings -> setDivision('NFC West');
        $vikings -> setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/MIN');
        $vikings -> setEstablished('1961');
        $vikings -> setHeadCoach("Kevin O'Connell");
        $vikings-> setOwner('Zygi Wilf');

        $saints = new Team();
        $saints-> setCode(10);
        $saints -> setName('New Orleans Saints');
        $saints -> setCity('New Orleans');
        $saints -> setDivision('NFC West');
        $saints -> setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/NO');
        $saints -> setEstablished('1967');
        $saints -> setHeadCoach('Dennis Allen');
        $saints-> setOwner('Gayle Benson');

        $giants = new Team();
        $giants-> setCode(11);
        $giants -> setName('New York Giants');
        $giants -> setCity('New York');
        $giants -> setDivision('NFC West');
        $giants -> setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/NY');
        $giants -> setEstablished('1925');
        $giants -> setHeadCoach('Brian Daboll');
        $giants-> setOwner('John Mara');

        $eagles = new Team();
        $eagles-> setCode(11);
        $eagles -> setName('Philadelphia Eagles');
        $eagles -> setCity('Philadelphia');
        $eagles -> setDivision('NFC West');
        $eagles -> setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/PHI');
        $eagles -> setEstablished('1933');
        $eagles -> setHeadCoach('Nick Sirianni');
        $eagles-> setOwner('Jeffrey Lurie');

        $sf49 = new Team();
        $sf49-> setCode(12);
        $sf49 -> setName('San Francisco 49ers');
        $sf49 -> setCity('Santa Clara');
        $sf49 -> setDivision('NFC West');
        $sf49 -> setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/SF');
        $sf49 -> setEstablished('1946');
        $sf49 -> setHeadCoach('Kyle Shanahan');
        $sf49-> setOwner('Jed York');

        $seahaws = new Team();
        $seahaws-> setCode(13);
        $seahaws -> setName('Seattle Seahaws');
        $seahaws -> setCity('Seattle');
        $seahaws -> setDivision('NFC West');
        $seahaws -> setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/SEA');
        $seahaws -> setEstablished('1976');
        $seahaws -> setHeadCoach('Pete Carroll');
        $seahaws-> setOwner('Seattle Seahawks Ownership Trust');

        $tampa = new Team();
        $tampa-> setCode(14);
        $tampa -> setName('Tampa Bay Buccaneers');
        $tampa -> setCity('Tampa Bay');
        $tampa -> setDivision('NFC West');
        $tampa -> setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/TB');
        $tampa-> setEstablished('1976');
        $tampa -> setHeadCoach('Todd Bowles');
        $tampa-> setOwner('Bryan Glazer, Edward Glazer, Joel Glazer');

        $washington = new Team();
        $washington-> setCode(15);
        $washington -> setName('Washington Commanders');
        $washington -> setCity('Washington');
        $washington -> setDivision('NFC West');
        $washington -> setLogo('https://static.www.nfl.com/t_headshot_desktop_2x/f_auto/league/api/clubs/logos/WAS');
        $washington-> setEstablished('1932');
        $washington -> setHeadCoach('Ron Rivera');
        $washington-> setOwner('Dan Snyder');

        
    }

}
