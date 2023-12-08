<?php

namespace App\Controller;

use App\Entity\QuizResults;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Question;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
        $questions = $registry->getManager()->getRepository('App\Entity\Question')->findAll();

        $quiz_result = new QuizResults();

        $form = $this->createFormBuilder($quiz_result)
            ->add('name', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Create Task'])
            ->getForm();

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $quiz_result = $form->getData();
            $quiz_result->setScore($currentScore);

            $entityManager = $registry->getManager();
            $entityManager->persist($quiz_result);
            $entityManager->flush();

            $this->redirectToRoute('app_classement');
        }

        return $this->render('quizz/fin.html.twig', [
            'currentScore' => $currentScore,
            'questions' => $questions,
            'form' => $form
        ]);
    }

    #[Route('/quizz', name: 'quizz')]
    public function quizz(ManagerRegistry $registry): Response
    {
        return $this->render('quizz/quizz.html.twig');
    }
}
