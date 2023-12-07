<?php

namespace App\DataFixtures;

use App\Entity\QuizResults;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 90; $i++) {

            $player11 = new QuizResults();
            $player11->setName("Random Player $i");
            $player11->setScore($i);
            $manager->persist($player11);
        }
        $player1 = new QuizResults();
        $player1->setName("Ruyben");
        $player1->setScore(1120);
        $manager->persist($player1);

        $player2 = new QuizResults();
        $player2->setName("Tinsuki");
        $player2->setScore(1520);
        $manager->persist($player2);

        $player3 = new QuizResults();
        $player3->setName("SarkastikLrd");
        $player3->setScore(1330);
        $manager->persist($player3);

        $player4 = new QuizResults();
        $player4->setName("Imagination");
        $player4->setScore(1257);
        $manager->persist($player4);

        $player5 = new QuizResults();
        $player5->setName("Cat in Sunglasses");
        $player5->setScore(495);
        $manager->persist($player5);

        $player6 = new QuizResults();
        $player6->setName("Altaks");
        $player6->setScore(352);
        $manager->persist($player6);

        $player7 = new QuizResults();
        $player7->setName("LRDN");
        $player7->setScore(650);
        $manager->persist($player7);

        $player8 = new QuizResults();
        $player8->setName("Martonks Pinonks");
        $player8->setScore(1651);
        $manager->persist($player8);

        $player9 = new QuizResults();
        $player9->setName("Ginbotahksy");
        $player9->setScore(847);
        $manager->persist($player9);

        $player10 = new QuizResults();
        $player10->setName("Vorondelle");
        $player10->setScore(950);
        $manager->persist($player10);

        $manager->flush();
    }
}
