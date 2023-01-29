<?php

namespace App\Controller;

use App\Entity\Joueur;
use App\Entity\Question;
use App\Entity\Reponse;
use App\Form\Type\QuestionType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="app_admin")
     */
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        $question = new Question();
        $reponse = new Reponse();
        $question->addReponse($reponse);
        $questionform = $this->createForm(QuestionType::class, $question);
        $questionform->handleRequest($request);
        if ($questionform->isSubmitted() && $questionform->isValid()) {
            $manager = $doctrine->getManager();
            $question->setValidated(true);
            $manager->persist($question);
            foreach ($question->getReponses() as $reponse) {
                $manager->persist($reponse);
            }
            $manager->flush();
            return $this->redirectToRoute('app_admin');
        }


        // Question pas encore acceptées
        $manager = $doctrine->getManager();
        $questions = $manager->getRepository(Question::class)->findWaitingQuestions();
        $users = $manager->getRepository(Joueur::class)->findAll();


        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'title' => 'Espace d\'administration',
            'questionform' => $questionform->createView(),
            'questions' => $questions,
            'users' => $users
        ]);
    }

    /**
     * @Route("/admin/question/validate/{id}")
     */
    public function validateQuestion($id, ManagerRegistry $doctrine){
        $manager = $doctrine->getManager();
        $question = $manager->getRepository(Question::class)->find($id);

        $question->setValidated(true);

        $manager->persist($question);
        $manager->flush();

        return $this->redirectToRoute('app_admin');
    }

    /**
     * @Route("/admin/question/delete/{id}")
     */
    public function deleteQuestion($id, ManagerRegistry $doctrine){
        $manager = $doctrine->getManager();
        $question = $manager->getRepository(Question::class)->find($id);

        foreach($question->getReponses() as $reponse){
            $manager->getRepository(Reponse::class)->remove($reponse);
            $manager->flush();
        }

        $manager->getRepository(Question::class)->remove($question);

        $manager->flush();

        return $this->redirectToRoute('app_admin');
    }
}
