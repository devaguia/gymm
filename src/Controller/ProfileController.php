<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ProfileType;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{

    public function __construct(
        private UsersRepository $userRepository,
        private EntityManagerInterface $entityManager
    )
    {}

    #[Route('/profile', name: 'app_profile', methods: ['GET'])]
    public function index(): Response
    {
        $user = $this->userRepository->findOneBy(['id' => 1]);

        $profileForm = $this->createForm(ProfileType::class, $user);
        return $this->render('profile/index.html.twig', compact('profileForm', 'user'));
    }

    #[Route('/profile', name: 'app_save_profile', methods: ['PATCH'])]
    public function saveProfile(Request $request): Response
    {
        $user = $this->userRepository->findOneBy(['id' => 1]);

        $profileForm = $this->createForm(ProfileType::class, $user)
            ->handleRequest($request);

        if (!$profileForm->isValid()) {
            return $this->render('profile/index.html.twig', compact('profileForm', 'user'));
        }

        $this->addFlash('success', "User profile successfully updated!");

        $this->entityManager->flush();

        return new RedirectResponse('/profile');
    }

    #[Route('/profile/progress', name: 'app_profile_progress', methods: ['GET'])]
    public function renderProgressPage(): Response
    {
        return $this->render('profile/progress.html.twig', [
            'controller_name' => 'ProfileController',
        ]);
    }
}
