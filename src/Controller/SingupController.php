<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\SingupType;
use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SingupController extends AbstractController
{

    public function __construct(private UsersRepository $userRepository)
    {}

    #[Route('/singup', name: 'app_singup', methods: ['GET'])]
    public function index(): Response
    {
        $singUpForm = $this->createForm(SingupType::class, new User());
        return $this->render('singup/form.html.twig', compact('singUpForm'));
    }

    #[Route('/singup', methods: ['POST'])]
    public function singUp(Request $request): Response
    {
        $user = new User();
        $singUpForm = $this->createForm(SingupType::class, $user)
            ->handleRequest($request);

        if (!$singUpForm->isValid()) {
            return $this->render('singup/form.html.twig', compact('singUpForm'));
        }

        $this->userRepository->add($user, true);

        return new RedirectResponse('/sheets');
    }
}
