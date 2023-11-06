<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SingupController extends AbstractController
{
    #[Route('/singup', name: 'app_singup', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('singup/index.html.twig', [
            'controller_name' => 'SingupController',
        ]);
    }
}
