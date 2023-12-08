<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use App\Entity\QuizResults;
use App\Repository\QuizResultsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClassementController extends AbstractController
{
    #[Route('/classement', name: 'app_classement')]
    public function index(ManagerRegistry $managerRegistry): Response
    {
        $participants = $managerRegistry->getManager()->getRepository('App\Entity\QuizResults')->findAllOrdered();
        $participants = array_slice($participants, 0, 96);

        return $this->render('classement/question.html.twig', [
            'participants' => $participants
        ]);
    }
}
