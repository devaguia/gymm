<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExercisesController extends AbstractController
{
    #[Route('/exercises', name: 'app_exercises', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('exercises/index.html.twig', []);
    }

    #[Route('/exercises/new', name: 'app_add_exercises', methods: ['GET'])]
    public function addSheets(): Response
    {
        return $this->render('exercises/form.html.twig', []);
    }

    #[Route('/exercises/edit', name: 'app_edit_exercises', methods: ['GET'])]
    public function editSheets(): Response
    {
        return $this->render('exercises/form.html.twig', []);
    }
}
