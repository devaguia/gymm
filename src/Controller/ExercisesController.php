<?php

namespace App\Controller;

use App\Entity\Exercise;
use App\Entity\Series;
use App\Form\ExerciseType;
use App\Form\SeriesType;
use App\Repository\ExercisesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExercisesController extends AbstractController
{
    public function __construct(
        private ExercisesRepository $exercisesRepository,
        private EntityManagerInterface $entityManager
    )
    {}

    #[Route('/exercises', name: 'app_exercises', methods: ['GET'])]
    public function index(Request $request): Response
    {
        $exerciseList = $this->exercisesRepository->findAll();

        return $this->render('exercises/index.html.twig', [
            'exerciseList' => $exerciseList
        ]);
    }

    #[Route('/exercises/new', name: 'app_add_exercise', methods: ['GET'])]
    public function addExerciseForm(): Response
    {
        $exerciseForm = $this->createForm(ExerciseType::class, new Exercise());
        return $this->render('exercises/form.html.twig', compact('exerciseForm'));
    }

    #[Route('/exercises/new', methods: ['POST'])]
    public function addExercise(Request $request): Response
    {
        $exercise = new Exercise();
        $exerciseForm = $this->createForm(ExerciseType::class, $exercise)
            ->handleRequest($request);

        if (!$exerciseForm->isValid()) {
            return $this->render('series/form.html.twig', compact('exerciseForm'));
        }

        $this->exercisesRepository->add($exercise, true);

        $this->addFlash('success', "Exercise \"{$exercise->getName()}\" added successfully!");

        return new RedirectResponse('/exercises');
    }

    #[Route('/exercises/edit/{exercise}',
        name: 'app_edit_exercise',
        methods: ['GET']
    )]
    public function editExercise(Exercise $exercise): Response
    {
        $exerciseForm = $this->createForm(ExerciseType::class, $exercise, ['is_edit' => true]);
        return $this->render('exercises/form.html.twig', compact('exerciseForm', 'exercise'));
    }

    #[Route('/exercises/edit/{exercise}', name: 'app_save_edit_exercise', methods: ['PATCH'])]
    public function saveEditExercise(Exercise $exercise, Request $request): Response
    {
        $exerciseForm = $this->createForm(ExerciseType::class, $exercise, ['is_edit' => true])
            ->handleRequest($request);

        if (!$exerciseForm->isValid()) {
            return $this->render('exercises/form.html.twig', compact('exerciseForm', 'exercise'));
        }

        $this->addFlash('success', "Exercise \"{$exercise->getName()}\" successfully updated!");

        $this->entityManager->flush();
        return new RedirectResponse('/exercises');
    }

    #[Route('/exercises/delete/{id}',
        name: 'app_delete_exercise',
        requirements: ['id' => '\d+'],
        methods: ['DELETE']
    )]
    public function deleteExercise(int $id, Request $request): Response
    {
        $this->exercisesRepository->removeById($id);
        $this->addFlash('success', 'Exercise successfully removed!');

        return new RedirectResponse('/exercises');
    }
}
