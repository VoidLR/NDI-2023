<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function accueil(): Response
    {
        return $this->render('index/index.html.twig', []);
    }

    #[Route('/informations', name: 'informations')]
    public function informations(): Response
    {
        return $this->render('index/index.html.twig', []);
    }
}
