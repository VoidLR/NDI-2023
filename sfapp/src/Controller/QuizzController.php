<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Question;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class QuizzController extends AbstractController
{
    #[Route('/quizz/{id}/{currentScore}', name: 'quizz_id')]
    public function quizz_id(int $id, int $currentScore,  ManagerRegistry $registry, Request $request): Response
    {
        $question = $registry->getManager()->getRepository('App\Entity\Question')->find($id);

        if ($request->getMethod() == 'POST') {
            $currentScore = $_POST['currentScore'];
            $id = $_POST['id'];
            $answer = $_POST['reponses'];

            if ($answer == $question->getNumBonneRep()){
                $currentScore += 1;
            }
            if ($id == $registry->getManager()->getRepository('App\Entity\Question')->questionLeft($id)){
                return $this->redirectToRoute('quizz_fin', ['currentScore' =>$currentScore]);
            }
            return $this->redirectToRoute('quizz_id', ['id' => $id+1, 'currentScore' =>$currentScore]);
        }

        return $this->render('quizz/question.html.twig', [
            'id' => $id,
            'question' => $question->getText(),
            'reponse1' => $question->getReponse1(),
            'reponse2' => $question->getReponse2(),
            'reponse3' => $question->getReponse3(),
            'reponse4' => $question->getReponse4(),
            'bonneReponse' => $question->getNumBonneRep(),
            'currentScore' => $currentScore
        ]);
    }

    #[Route('/quizz/{currentScore}', name: 'quizz_fin')]
    public function quizz_fin(int $currentScore,  ManagerRegistry $registry, Request $request): Response
    {
        return $this->render('quizz/fin.html.twig', [
            'currentScore' => $currentScore
        ]);
    }

    #[Route('/quizz', name: 'quizz')]
    public function quizz(ManagerRegistry $registry): Response
    {
        return $this->render('quizz/quizz.html.twig');
    }
}
