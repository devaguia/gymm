<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_profile', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('profile/index.html.twig', [
            'controller_name' => 'ProfileController',
        ]);
    }

    #[Route('/profile/progress', name: 'app_profile_progress', methods: ['GET'])]
    public function renderProgressPage(): Response
    {
        return $this->render('profile/progress.html.twig', [
            'controller_name' => 'ProfileController',
        ]);
    }
}
