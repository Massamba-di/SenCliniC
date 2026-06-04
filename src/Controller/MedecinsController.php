<?php

namespace App\Controller;

use App\Entity\Medecins;
use App\Form\MedecinsType;
use App\Repository\MedecinsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/medecins')]
final class MedecinsController extends AbstractController
{
    #[Route(name: 'app_medecins_index', methods: ['GET'])]
    public function index(MedecinsRepository $medecinsRepository): Response
    {
        return $this->render('medecins/index.html.twig', [
            'medecins' => $medecinsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_medecins_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $medecin = new Medecins();
        $form = $this->createForm(MedecinsType::class, $medecin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($medecin);
            $entityManager->flush();

            return $this->redirectToRoute('app_medecins_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('medecins/new.html.twig', [
            'medecin' => $medecin,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_medecins_show', methods: ['GET'])]
    public function show(Medecins $medecin): Response
    {
        return $this->render('medecins/show.html.twig', [
            'medecin' => $medecin,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_medecins_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Medecins $medecin, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MedecinsType::class, $medecin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_medecins_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('medecins/edit.html.twig', [
            'medecin' => $medecin,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_medecins_delete', methods: ['POST'])]
    public function delete(Request $request, Medecins $medecin, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$medecin->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($medecin);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_medecins_index', [], Response::HTTP_SEE_OTHER);
    }
}
