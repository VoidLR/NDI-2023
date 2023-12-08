<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Question;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class QuizzController extends AbstractController
{
    #[Route('/quizz/{id}', name: 'quizz_id')]
    public function quizz_id(int $id, ManagerRegistry $registry, Request $request): Response
    {
        $question = $registry->getManager()->getRepository('App\Entity\Question')->find($id);

        return $this->render('quizz/question.html.twig', [
            'id' => $id,
            'question' => $question->getText(),
            'reponse1' => $question->getReponse1(),
            'reponse2' => $question->getReponse2(),
            'reponse3' => $question->getReponse3(),
            'reponse4' => $question->getReponse4(),
            'bonneReponse' => $question->getNumBonneRep(),
        ]);
    }

    #[Route('/quizz', name: 'quizz')]
    public function quizz(): Response
    {
        return $this->render('quizz/quizz.html.twig');
    }
}
