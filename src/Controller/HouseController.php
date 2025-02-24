<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HouseController extends AbstractController{
    #[Route('/les-maisons', name: 'houseAll')]
    public function all(): Response
    {


        return $this->render('house/index.html.twig', [
          
        ]);
    }

    #[Route('/la-petite-maison', name: 'house1')]
    public function index(): Response
    {
        return $this->render('house/house1.html.twig', [
            'controller_name' => 'HouseController',
        ]);
    }

    #[Route('/la-maison-des-cousins', name: 'house2')]
    public function perigourdine(): Response
    {
        return $this->render('house/house2.html.twig', [
            'controller_name' => 'HouseController',
        ]);
    }

    #[Route('/la-grande-maison', name: 'house3')]
    public function castille(): Response
    {
        return $this->render('house/house3.html.twig', [
            'controller_name' => 'HouseController',
        ]);
    }
}
