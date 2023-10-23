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
        return $this->render('sheets/index.html.twig', []);
    }

    #[Route('/sheets/view', name: 'app_view_sheets', methods: ['GET'])]
    public function viewSheets(): Response
    {
        return $this->render('sheets/sheet.html.twig', []);
    }
    #[Route('/sheets/new', name: 'app_add_sheets', methods: ['GET'])]
    public function addSheets(): Response
    {
        return $this->render('sheets/form.html.twig', []);
    }

    #[Route('/sheets/edit', name: 'app_edit_sheets', methods: ['GET'])]
    public function editSheets(): Response
    {
        return $this->render('sheets/form.html.twig', []);
    }
}
