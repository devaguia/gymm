<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SinginController extends AbstractController
{
    #[Route('/singin', name: 'app_singin', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('singin/index.html.twig', [
            'controller_name' => 'SinginController',
        ]);
    }
}
