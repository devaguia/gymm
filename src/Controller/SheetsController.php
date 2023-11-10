<?php

namespace App\Controller;

use App\Entity\Sheet;
use App\Form\SheetType;
use App\Repository\SheetsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SheetsController extends AbstractController
{
    public function __construct(
        private SheetsRepository       $sheetsRepository,
        private EntityManagerInterface $entityManager
    )
    {}

    #[Route('/sheets', name: 'app_sheets', methods: ['GET'])]
    public function index(): Response
    {
        $sheetList = $this->sheetsRepository->findAll();

        return $this->render('sheets/index.html.twig', [
            'sheetList' => $sheetList
        ]);
    }

    #[Route('/sheets/view', name: 'app_view_sheets', methods: ['GET'])]
    public function viewSheets(): Response
    {
        return $this->render('sheets/sheet.html.twig', []);
    }
    #[Route('/sheets/new', name: 'app_add_sheets', methods: ['GET'])]
    public function addSheetForm(): Response
    {
        $sheetForm = $this->createForm(SheetType::class, new Sheet());
        return $this->render('sheets/form.html.twig', compact('sheetForm'));
    }

    #[Route('/sheets/new', methods: ['POST'])]
    public function addExercise(Request $request): Response
    {
        $sheet = new Sheet();
        $sheetForm = $this->createForm(SheetType::class, $sheet)
            ->handleRequest($request);

        if (!$sheetForm->isValid()) {
            return $this->render('series/form.html.twig', compact('sheetForm'));
        }

        $this->sheetsRepository->add($sheet, true);

        $this->addFlash('success', "Sheet \"{$sheet->getName()}\" added successfully!");

        return new RedirectResponse('/sheets');
    }

    #[Route('/sheets/edit/{sheet}',
        name: 'app_edit_sheet',
        methods: ['GET']
    )]
    public function editExercise(Sheet $sheet): Response
    {
        $sheetForm = $this->createForm(SheetType::class, $sheet, ['is_edit' => true]);
        return $this->render('sheets/form.html.twig', compact('sheetForm', 'sheet'));
    }

    #[Route('/sheets/edit/{sheet}', name: 'app_save_edit_sheet', methods: ['PATCH'])]
    public function saveEditExercise(Sheet $sheet, Request $request): Response
    {
        $sheetForm = $this->createForm(SheetType::class, $sheet, ['is_edit' => true])
            ->handleRequest($request);

        if (!$sheetForm->isValid()) {
            return $this->render('sheets/form.html.twig', compact('sheetForm', 'sheet'));
        }

        $this->addFlash('success', "Sheet \"{$sheet->getName()}\" successfully updated!");

        $this->entityManager->flush();
        return new RedirectResponse('/sheets');
    }

    #[Route('/sheet/delete/{id}',
        name: 'app_delete_sheet',
        requirements: ['id' => '\d+'],
        methods: ['DELETE']
    )]
    public function deleteExercise(int $id, Request $request): Response
    {
        $this->sheetsRepository->removeById($id);
        $this->addFlash('success', 'Sheet successfully removed!');

        return new RedirectResponse('/sheets');
    }
}
