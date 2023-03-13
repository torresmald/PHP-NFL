<?php

namespace App\Controller;

use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/create/user', name:'createUser')]
    public function insertUser(Request $request, EntityManagerInterface $doctrine, UserPasswordHasherInterface $haser)
    {
        $form = $this->createForm(UserType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $password = $user->getPassword();
            $encryptedPass = $haser->hashPassword($user, $password);
            $user-> setPassword($encryptedPass);
            $doctrine->persist($user);
            $doctrine->flush();
            $this->addFlash('success', 'User created succesfully');
            return $this->redirectToRoute('listTeams');
        }
        return $this->renderForm('teams/createTeams.html.twig', [
            'form' => $form
        ]);
    }
    #[Route('/create/admin', name:'createAdmin')]
    public function insertAdmin(Request $request, EntityManagerInterface $doctrine, UserPasswordHasherInterface $haser)
    {
        $form = $this->createForm(UserType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $password = $user->getPassword();
            $encryptedPass = $haser->hashPassword($user, $password);
            $user-> setPassword($encryptedPass);
            $user->setRoles(['ROLE_ADMIN', 'ROLE_USER']);
            $doctrine->persist($user);
            $doctrine->flush();
            $this->addFlash('success', 'User created succesfully');
            return $this->redirectToRoute('listTeams');
        }
        return $this->renderForm('teams/createTeams.html.twig', [
            'form' => $form
        ]);
    }
}
