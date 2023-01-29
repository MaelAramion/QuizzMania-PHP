<?php

namespace App\Controller;

use App\Entity\Joueur;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(): Response
    {
        $joueurs = $this->getDoctrine()->getRepository(Joueur::class)->findAllSortedbyNote();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'title' => 'Accueil',
            'joueurs' => $joueurs
        ]);
    }
}
