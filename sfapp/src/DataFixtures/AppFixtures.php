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

        //Questions Quizz

        $question = new Question(
            'Depuis la révolution industrielle, la température globale a augmenté de :',
            '1,1°C', //Bonne réponse
            '1°C',
            '0,5°C',
            '2,5°C',
            1
        );
        $manager->persist($question);

        $question = new Question(
            'Les XX % de ménages ayant les émissions par habitant les plus élevées contribuent à 34-45 % des émissions mondiales de gaz à effet de serre.',
            '5%',
            '10%', //Bonne réponse
            '15%',
            '25%',
            2
        );
        $manager->persist($question);

        $question = new Question(
            'La mortalité due aux inondations, à la sécheresse et aux tempêtes a été jusqu’à XX fois plus élevée dans les pays du Sud au cours de la dernière décennie.',
            '5',
            '10',
            '15', //Bonne réponse
            '25',
            3
        );
        $manager->persist($question);

        $question = new Question(
            'Combien de km² de forêts sont détruits chaque année (en moyenne sur la période 2010-2018)',
            '78,000', //Bonne réponse
            '73,000',
            '68,000',
            '88,0000',
            1
        );
        $manager->persist($question);

        $question = new Question(
            'Parmis les espèces étudiées par le GIEC, quelle proportion a subi des extinctions de populations locales ?',
            '47%', //Bonne réponse
            '45%',
            '40%',
            '50%',
            1
        );
        $manager->persist($question);

        $question = new Question(
        'Le changement climatique, combiné à la destruction des habitats de certaines espèces, rendrait les pandémies combien de fois plus probables ?',
        '2',
        '2.5',
        '3', //Bonne réponse
        '5',
        3
    );
        $manager->persist($question);

        $question = new Question(
            'Parmi les 17 types de risques professionnels listés par l’Agence nationale de sécurité sanitaire de l’alimentation, de l’environnement et du travail (Anses), de combien seront affectés et potentiellement accrus par le changement climatique ?',
            '8',
            '10',
            '12',
            '15',//Bonne réponse
            4
        );
        $manager->persist($question);

        $question = new Question(
            'Les transports sont le premier secteur émetteur de gaz à effet de serre en France, avec 31% des émissions. Parmi ces émissions, quelle proportion occupe la voiture individuelle ?',
            '30%',
            '47%',
            '53%',//Bonne réponse
            '65%',
            3
        );
        $manager->persist($question);

        $question = new Question(
            'Quelle proportion des récifs coralliens pourraient disparaître si le réchauffement climatique atteint +2°C ?',
            '80%',
            '90%',
            '95%',
            '99%',//Bonne réponse
            4
        );
        $manager->persist($question);

        $question = new Question(
            'Combien y a-t’il d’objectifs développement durable (ODD), les ODD étant un ensemble d’objectifs de l’ONU pour le climat pour l’horizon 2030 ?',
            '13',
            '15',
            '17',//Bonne réponse
            '20',
            3
        );
        $manager->persist($question);

        $question = new Question(
            'Selon les calculs de l’ADEME, combien de fois plus polluant est un voyage en avion par rapport à une voyage en train ?',
            '17',
            '20',
            '23',//Bonne réponse
            '26',
            3
        );
        $manager->persist($question);

        $question = new Question(
            'Selon l’ADEME quelle proportion des déplacements en voiture individuelle sont effectués pour des trajets inférieurs à 5 km ?',
            '55%',
            '65%',
            '75%',//Bonne réponse
            '85%',
            3
        );
        $manager->persist($question);

        $question = new Question(
            'Combien de millions de tonnes de CO2 la SNCF affirme-t-elle avoir fait économiser en 2019 grâce au total des trajets réservés en 2019 sur leur site (soit 43,1 milliards de kilomètres) plutôt que via une quelconque compagnie aérienne ? ',
            '1.5',
            '2.1',//Bonne réponse
            '2.5',
            '3',
            2
        );
        $manager->persist($question);

        $question = new Question(
            'A partir de quelle augmentation de température court-on le risque de rendre la terre sérieusement invivable ? ',
            '3°C',
            '5°C',//Bonne réponse
            '7°C',
            '10°C',
            2
        );
        $manager->persist($question);

        $question = new Question(
            'Quel est le principal gaz à effet de serre émis par l’homme ? ',
            'Le Dioxyde de Carbonne (CO₂)',//Bonne réponse
            'Le Méthane (CH4)',
            'Le Protoxyde d’Azote (N2O)',
            'L’Ozone (O3)',
            1
        );
        $manager->persist($question);

        $question = new Question(
            'Quels écosystèmes captent le plus de CO₂ ? ',
            'Les forêts tempérées',//Bonne réponse
            'Les forêts tropicales',
            'Les océans',
            'Les mangroves',
            1
        );
        $manager->persist($question);

        $question = new Question(
            'De quelle proportion des émissions le secteur de l’agriculture est-il responsable ? ',
            '11%',
            '14%',
            '19%',//Bonne réponse
            '21%',
            3
        );
        $manager->persist($question);

        $question = new Question(
            'Combien les effets liés aux changement climatique coûteraient chaque année aux états même si les accords de Paris sont remplis ? ',
           '900 millions $',
            '150 milliards $',//Bonne réponse
            '300 milliards $',
            '1000 milliards $',
            2
        );
        $manager->persist($question);

        $question = new Question(
            'Selon l’ADEME, la hausse des températures moyennes en France entre 1900 et 2021 est de : ',
            '1.2°C',
            '1.5°C',
            '1.7°C',//Bonne réponse
            '2.1°C',
            3
        );
        $manager->persist($question);

        $question = new Question(
            'Selon l’ADEME, combien de pourcentage d’émissions de gaz à effet de serre des ménages français liées à l’alimentation ? ',
            '16%',
            '20%',
            '23%',//Bonne réponse
            '25%',
            3
        );
        $manager->persist($question);

        $manager->flush();

    }
}
