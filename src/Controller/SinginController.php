<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\SinginType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SinginController extends AbstractController
{
    #[Route('/singin', name: 'app_singin', methods: ['GET'])]
    public function index(): Response
    {
        $singInForm = $this->createForm(SinginType::class, new User());
        return $this->render('singin/form.html.twig', compact('singInForm'));
    }

    #[Route('/singin', methods: ['POST'])]
    public function singUp(Request $request): Response
    {
        $user = new User();
        $singInform = $this->createForm(SinginType::class, $user)
            ->handleRequest($request);

        if (!$singInform->isValid()) {
            return $this->render('singin/form.html.twig', compact('singInform'));
        }

        return new RedirectResponse('/sheets');
    }
}
