<?php

namespace App\Controller;

use App\Repository\AdRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(AdRepository $adRepository): Response
    {
        $ad = $adRepository->findAll();
        
        return $this->render('home/index.html.twig', [
            'ad' => $ad,
            'controller_name' => 'HomeController',
        ]);
    }
}
