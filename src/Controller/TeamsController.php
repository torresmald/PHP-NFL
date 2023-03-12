<?php

namespace App\Controller;

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
            'logo' => 'https://static.www.nfl.com/image/private/f_auto/league/u9fltoslqdsyao8cpm0k',
            'established' => 1920,
            'headCoach' => 'Jonathan Gannon'
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
}
