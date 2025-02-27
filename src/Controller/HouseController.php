<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HouseController extends AbstractController
{
    private array $houses = [
        'house1' => [
            'nom' => 'La Petite Maison',
            'description' => "Charme absolu pour cette petite ferme où rien ne manque.",
            'image' => 'images/house/Petite/maison.jpeg',
        ],
        'house2' => [
            'nom' => 'La Maison des Cousins',
            'description' => "Véritable maison périgourdine avec toit à deux pentes et tuiles plates. Mur à colombages et magnifiques chambres avec charpentes apparentes.",
            'image' => 'images/house/Perigourdine/vue ciel2.jpg',
        ],
        'house3' => [
            'nom' => 'La Grande Maison',
            'description' => "Superbe maison de caractère au charme intemporel. Cuisine et salle à manger très conviviales. Lieu idéal pour des retrouvailles entre amis et familles.",
            'image' => 'images/house/Castille/vue ciel5.png',
        ]
    ];

    #[Route('/les-maisons', name: 'houseAll')]
    public function all(): Response
    {
        return $this->render('house/index.html.twig', [
            'houses' => $this->houses,
        ]);
    }

    #[Route('/la-petite-maison', name: 'house1')]
    public function index(): Response
    {
        return $this->render('house/house1.html.twig', [
            'maison' => $this->houses['house1'],
        ]);
    }

    #[Route('/la-maison-des-cousins', name: 'house2')]
    public function perigourdine(): Response
    {
        return $this->render('house/house2.html.twig', [
            'maison' => $this->houses['house2'],
        ]);
    }

    #[Route('/la-grande-maison', name: 'house3')]
    public function castille(): Response
    {
        return $this->render('house/house3.html.twig', [
            'maison' => $this->houses['house3'],
        ]);
    }
}
