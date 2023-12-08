<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EnjeuxController extends AbstractController
{
    #[Route('/enjeux', name: 'app_enjeux')]
    public function index(): Response
    {
        return $this->render('enjeux/question.html.twig', [
            'controller_name' => 'EnjeuxController',
        ]);
    }
}
