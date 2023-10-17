<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SheetsController extends AbstractController
{
    #[Route('/sheets', name: 'app_sheets', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('sheets/index.html.twig', [
            'controller_name' => 'SheetsController',
        ]);
    }
}
