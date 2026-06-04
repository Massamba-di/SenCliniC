<?php

namespace App\Controller;

use App\Entity\Creneaux;
use App\Form\CreneauxType;
use App\Repository\CreneauxRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/creneaux')]
final class CreneauxController extends AbstractController
{
    #[Route(name: 'app_creneaux_index', methods: ['GET'])]
    public function index(CreneauxRepository $creneauxRepository): Response
    {
        return $this->render('creneaux/index.html.twig', [
            'creneauxes' => $creneauxRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_creneaux_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $creneaux = new Creneaux();
        $form = $this->createForm(CreneauxType::class, $creneaux);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($creneaux);
            $entityManager->flush();

            return $this->redirectToRoute('app_creneaux_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('creneaux/new.html.twig', [
            'creneaux' => $creneaux,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_creneaux_show', methods: ['GET'])]
    public function show(Creneaux $creneaux): Response
    {
        return $this->render('creneaux/show.html.twig', [
            'creneaux' => $creneaux,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_creneaux_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Creneaux $creneaux, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CreneauxType::class, $creneaux);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_creneaux_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('creneaux/edit.html.twig', [
            'creneaux' => $creneaux,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_creneaux_delete', methods: ['POST'])]
    public function delete(Request $request, Creneaux $creneaux, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$creneaux->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($creneaux);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_creneaux_index', [], Response::HTTP_SEE_OTHER);
    }
}
