<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TeamsController extends AbstractController{
    #[Route('/teams')]
    public function showTeam(){
        $team = [
            'name' => 'KC Chiefs',
            'city' => 'Kansas City',
            'established' => 1920,
            'head coach' => 'Jonathan Gannon'
        ];
        return $this->render('teams/showTeams.html.twig', ['team' => $team]);
    }
}