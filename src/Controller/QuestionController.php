<?php

namespace App\Controller;

use App\Entity\Question;
use App\Entity\Reponse;
use App\Form\Type\QuestionType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController
{
    /**
     * @Route("/question", name="app_question")
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
            $question->setValidated(false);
            $manager->persist($question);
            foreach ($question->getReponses() as $reponse) {
                $manager->persist($reponse);
            }
            $manager->flush();
            return $this->redirectToRoute('app_question');
        }

        return $this->render('question/index.html.twig', [
            'controller_name' => 'QuestionController',
            'title' => 'Proposer une question',
            'questionform' => $questionform->createView()
        ]);
    }
}
