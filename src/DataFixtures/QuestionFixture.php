<?php

namespace App\DataFixtures;

use App\Entity\Question;
use App\Entity\Reponse;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class QuestionFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        // Question 1
        $q1 = new Question();
        $q1->setIntitule("Comment s'appelle le moteur de template utilisé par Symony ?");
        $q1->setPoints("10");
        $q1->setValidated(true);
        $manager->persist($q1);
        // Réponse 1 -> Question 1 -> Valide
        $q1r1 = new Reponse();
        $q1r1->setQuestion($q1);
        $q1r1->setReponse("Twig");
        $q1r1->setIsValid(true);
        $manager->persist($q1r1);
        // Réponse 2 -> Question 1 -> Invalide
        $q1r2 = new Reponse();
        $q1r2->setQuestion($q1);
        $q1r2->setReponse("HTML");
        $q1r2->setIsValid(false);
        $manager->persist($q1r2);
        // Réponse 3 -> Question 1 -> Invalide
        $q1r3 = new Reponse();
        $q1r3->setQuestion($q1);
        $q1r3->setReponse("SASS");
        $q1r3->setIsValid(false);
        $manager->persist($q1r3);
        // Réponse 4 -> Question 1 -> Invalide
        $q1r4 = new Reponse();
        $q1r4->setQuestion($q1);
        $q1r4->setReponse("Blade");
        $q1r4->setIsValid(false);
        $manager->persist($q1r4);

        // -------------------------------

        // Question 2
        $q2 = new Question();
        $q2->setIntitule("En quel langage est écrit le framework Symfony ?");
        $q2->setPoints("10");
        $q2->setValidated(true);
        $manager->persist($q2);
        // Réponse 1 -> Question 2 -> Valide
        $q2r1 = new Reponse();
        $q2r1->setQuestion($q2);
        $q2r1->setReponse("PHP");
        $q2r1->setIsValid(true);
        $manager->persist($q2r1);
        // Réponse 2 -> Question 2 -> Invalide
        $q2r2 = new Reponse();
        $q2r2->setQuestion($q2);
        $q2r2->setReponse("JAVA");
        $q2r2->setIsValid(false);
        $manager->persist($q2r2);
        // Réponse 3 -> Question 2 -> Invalide
        $q2r3 = new Reponse();
        $q2r3->setQuestion($q2);
        $q2r3->setReponse("C++");
        $q2r3->setIsValid(false);
        $manager->persist($q2r3);
        // Réponse 4 -> Question 2 -> Invalide
        $q2r4 = new Reponse();
        $q2r4->setQuestion($q2);
        $q2r4->setReponse("JavaScript");
        $q2r4->setIsValid(false);
        $manager->persist($q2r4);

        // -------------------------------

        // Question 3
        $q3 = new Question();
        $q3->setIntitule("Quelle est le nom de l'ORM utilisé par Symfony ?");
        $q3->setPoints("20");
        $q3->setValidated(true);
        $manager->persist($q3);
        // Réponse 1 -> Question 3 -> Valide
        $q3r1 = new Reponse();
        $q3r1->setQuestion($q3);
        $q3r1->setReponse("Doctrine");
        $q3r1->setIsValid(true);
        $manager->persist($q3r1);
        // Réponse 2 -> Question 3 -> Invalide
        $q3r2 = new Reponse();
        $q3r2->setQuestion($q3);
        $q3r2->setReponse("Eloquent");
        $q3r2->setIsValid(false);
        $manager->persist($q3r2);
        // Réponse 3 -> Question 3 -> Invalide
        $q3r3 = new Reponse();
        $q3r3->setQuestion($q3);
        $q3r3->setReponse("JPA");
        $q3r3->setIsValid(false);
        $manager->persist($q3r3);
        // Réponse 4 -> Question 3 -> Invalide
        $q3r4 = new Reponse();
        $q3r4->setQuestion($q3);
        $q3r4->setReponse("Blade");
        $q3r4->setIsValid(false);
        $manager->persist($q3r4);

        // -------------------------------

        // Question 4
        $q4 = new Question();
        $q4->setIntitule("Dans quelle type de classe sont définis les routes dans Symfony?");
        $q4->setPoints("10");
        $q4->setValidated(true);
        $manager->persist($q4);
        // Réponse 1 -> Question 4 -> Valide
        $q4r1 = new Reponse();
        $q4r1->setQuestion($q4);
        $q4r1->setReponse("Controller");
        $q4r1->setIsValid(true);
        $manager->persist($q4r1);
        // Réponse 2 -> Question 4 -> Invalide
        $q4r2 = new Reponse();
        $q4r2->setQuestion($q4);
        $q4r2->setReponse("Repository");
        $q4r2->setIsValid(false);
        $manager->persist($q4r2);
        // Réponse 3 -> Question 4 -> Invalide
        $q4r3 = new Reponse();
        $q4r3->setQuestion($q4);
        $q4r3->setReponse("Entity");
        $q4r3->setIsValid(false);
        $manager->persist($q4r3);
        // Réponse 4 -> Question 4 -> Invalide
        $q4r4 = new Reponse();
        $q4r4->setQuestion($q4);
        $q4r4->setReponse("Fixture");
        $q4r4->setIsValid(false);
        $manager->persist($q4r4);

        // -------------------------------

        // Question 5
        $q5 = new Question();
        $q5->setIntitule("Dans quelle classe sont définis les méthodes pour récupérer des données en base de données ?");
        $q5->setPoints("10");
        $q5->setValidated(true);
        $manager->persist($q5);
        // Réponse 1 -> Question 5 -> Valide
        $q5r1 = new Reponse();
        $q5r1->setQuestion($q5);
        $q5r1->setReponse("Repository");
        $q5r1->setIsValid(true);
        $manager->persist($q5r1);
        // Réponse 2 -> Question 5 -> Invalide
        $q5r2 = new Reponse();
        $q5r2->setQuestion($q5);
        $q5r2->setReponse("Controller");
        $q5r2->setIsValid(false);
        $manager->persist($q5r2);
        // Réponse 3 -> Question 5 -> Invalide
        $q5r3 = new Reponse();
        $q5r3->setQuestion($q5);
        $q5r3->setReponse("Entity");
        $q5r3->setIsValid(false);
        $manager->persist($q5r3);
        // Réponse 4 -> Question 5 -> Invalide
        $q5r4 = new Reponse();
        $q5r4->setQuestion($q5);
        $q5r4->setReponse("Fixture");
        $q5r4->setIsValid(false);
        $manager->persist($q5r4);

        // -------------------------------

        // Question 6
        $q6 = new Question();
        $q6->setIntitule("Dans quelle classe sont définis les attributs d'une table ?");
        $q6->setPoints("20");
        $q6->setValidated(true);
        $manager->persist($q6);
        // Réponse 1 -> Question 6 -> Valide
        $q6r1 = new Reponse();
        $q6r1->setQuestion($q6);
        $q6r1->setReponse("Entity");
        $q6r1->setIsValid(true);
        $manager->persist($q6r1);
        // Réponse 2 -> Question 6 -> Invalide
        $q6r2 = new Reponse();
        $q6r2->setQuestion($q6);
        $q6r2->setReponse("Controller");
        $q6r2->setIsValid(false);
        $manager->persist($q6r2);
        // Réponse 3 -> Question 6 -> Invalide
        $q6r3 = new Reponse();
        $q6r3->setQuestion($q6);
        $q6r3->setReponse("Model");
        $q6r3->setIsValid(false);
        $manager->persist($q6r3);
        // Réponse 4 -> Question 6 -> Invalide
        $q6r4 = new Reponse();
        $q6r4->setQuestion($q6);
        $q6r4->setReponse("Fixture");
        $q6r4->setIsValid(false);
        $manager->persist($q6r4);

        // -------------------------------

        // Question 7
        $q7 = new Question();
        $q7->setIntitule("Quelle est la syntaxe pour afficher la valeur de la variable \"test\" dans un template Twig ?");
        $q7->setPoints("30");
        $q7->setValidated(true);
        $manager->persist($q7);
        // Réponse 1 -> Question 7 -> Valide
        $q7r1 = new Reponse();
        $q7r1->setQuestion($q7);
        $q7r1->setReponse("{{ test }}");
        $q7r1->setIsValid(true);
        $manager->persist($q7r1);
        // Réponse 2 -> Question 7 -> Invalide
        $q7r2 = new Reponse();
        $q7r2->setQuestion($q7);
        $q7r2->setReponse("{{ \$test }}");
        $q7r2->setIsValid(false);
        $manager->persist($q7r2);
        // Réponse 3 -> Question 7 -> Invalide
        $q7r3 = new Reponse();
        $q7r3->setQuestion($q7);
        $q7r3->setReponse("echo(test)");
        $q7r3->setIsValid(false);
        $manager->persist($q7r3);
        // Réponse 4 -> Question 7 -> Invalide
        $q7r4 = new Reponse();
        $q7r4->setQuestion($q7);
        $q7r4->setReponse("{{ print(test) }}");
        $q7r4->setIsValid(false);
        $manager->persist($q7r4);

        // -------------------------------

        // Question 8
        $q8 = new Question();
        $q8->setIntitule("Dans quel dossier doivent être placé les fichiers images et feuilles de style ?");
        $q8->setPoints("25");
        $q8->setValidated(true);
        $manager->persist($q8);
        // Réponse 1 -> Question 8 -> Valide
        $q8r1 = new Reponse();
        $q8r1->setQuestion($q8);
        $q8r1->setReponse("asset");
        $q8r1->setIsValid(true);
        $manager->persist($q8r1);
        // Réponse 2 -> Question 8 -> Invalide
        $q8r2 = new Reponse();
        $q8r2->setQuestion($q8);
        $q8r2->setReponse("controller");
        $q8r2->setIsValid(false);
        $manager->persist($q8r2);
        // Réponse 3 -> Question 8 -> Invalide
        $q8r3 = new Reponse();
        $q8r3->setQuestion($q8);
        $q8r3->setReponse("ressources");
        $q8r3->setIsValid(false);
        $manager->persist($q8r3);
        // Réponse 4 -> Question 8 -> Invalide
        $q8r4 = new Reponse();
        $q8r4->setQuestion($q8);
        $q8r4->setReponse("template");
        $q8r4->setIsValid(false);
        $manager->persist($q8r4);

        // -------------------------------

        // Question 9
        $q9 = new Question();
        $q9->setIntitule("Quel est le type de fichier dans lequel on définit les traductions du site ?");
        $q9->setPoints("20");
        $q9->setValidated(true);
        $manager->persist($q9);
        // Réponse 1 -> Question 9 -> Valide
        $q9r1 = new Reponse();
        $q9r1->setQuestion($q9);
        $q9r1->setReponse("YAML");
        $q9r1->setIsValid(true);
        $manager->persist($q9r1);
        // Réponse 2 -> Question 9 -> Invalide
        $q9r2 = new Reponse();
        $q9r2->setQuestion($q9);
        $q9r2->setReponse("XML");
        $q9r2->setIsValid(false);
        $manager->persist($q9r2);
        // Réponse 3 -> Question 9 -> Invalide
        $q9r3 = new Reponse();
        $q9r3->setQuestion($q9);
        $q9r3->setReponse("JSON");
        $q9r3->setIsValid(false);
        $manager->persist($q9r3);
        // Réponse 4 -> Question 9 -> Invalide
        $q9r4 = new Reponse();
        $q9r4->setQuestion($q9);
        $q9r4->setReponse("TXT");
        $q9r4->setIsValid(false);
        $manager->persist($q9r4);

        // -------------------------------

        // Question 10
        $q10 = new Question();
        $q10->setIntitule("Comment s'appellent les classes permettant de générer un jeu de données ?");
        $q10->setPoints("15");
        $q10->setValidated(true);
        $manager->persist($q10);
        // Réponse 1 -> Question 10 -> Valide
        $q10r1 = new Reponse();
        $q10r1->setQuestion($q10);
        $q10r1->setReponse("Fixture");
        $q10r1->setIsValid(true);
        $manager->persist($q10r1);
        // Réponse 2 -> Question 10 -> Invalide
        $q10r2 = new Reponse();
        $q10r2->setQuestion($q10);
        $q10r2->setReponse("Controller");
        $q10r2->setIsValid(false);
        $manager->persist($q10r2);
        // Réponse 3 -> Question 10 -> Invalide
        $q10r3 = new Reponse();
        $q10r3->setQuestion($q10);
        $q10r3->setReponse("Repository");
        $q10r3->setIsValid(false);
        $manager->persist($q10r3);
        // Réponse 4 -> Question 10 -> Invalide
        $q10r4 = new Reponse();
        $q10r4->setQuestion($q10);
        $q10r4->setReponse("Entity");
        $q10r4->setIsValid(false);
        $manager->persist($q10r4);

        $manager->flush();
    }
}
