<?php

namespace App\Controller;

use App\Entity\Pharmacies;
use App\Form\PharmaciesType;
use App\Repository\PharmaciesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/pharmacies')]
final class PharmaciesController extends AbstractController
{
    #[Route(name: 'app_pharmacies', methods: ['GET'])]
    public function index(PharmaciesRepository $pharmaciesRepository): Response
    {
        return $this->render('pharmacies/index.html.twig', [
            'pharmacies' => $pharmaciesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_pharmacies_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $pharmacy = new Pharmacies();
        $form = $this->createForm(PharmaciesType::class, $pharmacy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($pharmacy);
            $entityManager->flush();

            return $this->redirectToRoute('app_pharmacies_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('pharmacies/new.html.twig', [
            'pharmacy' => $pharmacy,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_pharmacies_show', methods: ['GET'])]
    public function show(Pharmacies $pharmacy): Response
    {
        return $this->render('pharmacies/show.html.twig', [
            'pharmacy' => $pharmacy,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_pharmacies_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Pharmacies $pharmacy, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PharmaciesType::class, $pharmacy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_pharmacies', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('pharmacies/edit.html.twig', [
            'pharmacy' => $pharmacy,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_pharmacies_delete', methods: ['POST'])]
    public function delete(Request $request, Pharmacies $pharmacy, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pharmacy->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($pharmacy);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_pharmacies_index', [], Response::HTTP_SEE_OTHER);
    }
}
