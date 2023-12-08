<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuizzController extends AbstractController
{
    #[Route('/quizz/{id}', name: 'app_quizz')]
    public function index(int $id): Response
    {
        return $this->render('quizz/index.html.twig', [
            'id' => $id,
            'question' => 'question',
            'reponse1' => 'reponse1',
            'reponse2' => 'reponse2',
            'reponse3' => 'reponse3',
            'reponse4' => 'reponse4',
            'bonneReponse' => 4,
        ]);
    }
}
