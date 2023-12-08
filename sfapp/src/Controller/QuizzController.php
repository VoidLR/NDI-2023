<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Question;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuizzController extends AbstractController
{
    #[Route('/quizz/{id}', name: 'app_quizz')]
    public function index(int $id, ManagerRegistry $registry): Response
    {
        $question = $registry->getManager()->getRepository('App\Entity\Question')->find($id);

        return $this->render('quizz/index.html.twig', [
            'id' => $id,
            'question' => $question->getText(),
            'reponse1' => $question->getReponse1(),
            'reponse2' => $question->getReponse2(),
            'reponse3' => $question->getReponse3(),
            'reponse4' => $question->getReponse4(),
            'bonneReponse' => $question->getNumBonneRep(),
        ]);
    }
}
