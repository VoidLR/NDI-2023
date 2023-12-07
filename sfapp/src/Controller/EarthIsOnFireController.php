<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EarthIsOnFireController extends AbstractController
{
    #[Route('/earth/is/on/fire', name: 'app_earth_is_on_fire')]
    public function index(): Response
    {
        return $this->render('earth_is_on_fire/index.html.twig', [
            'controller_name' => 'EarthIsOnFireController',
        ]);
    }
}
