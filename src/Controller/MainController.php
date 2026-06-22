<?php

namespace App\Controller;

use App\Repository\MedecinsRepository;
use App\Repository\PharmaciesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MainController extends AbstractController
{
    #[Route('/main', name: 'app_main')]
    public function index(Request $request, MedecinsRepository $medecinsRepository, PharmaciesRepository $pharmaciesRepository): Response


    {
        $medecins= $medecinsRepository->findAll();
        $pharmacies= $pharmaciesRepository->findAll();

        return $this->render('main/index.html.twig', [
            'medecins' => $medecins,
            'pharmacies' => $pharmacies,
        ]);
    }
}
