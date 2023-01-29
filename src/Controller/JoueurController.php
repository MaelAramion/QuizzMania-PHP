<?php

namespace App\Controller;

use App\Entity\Joueur;
use App\Form\Type\JoueurType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class JoueurController extends AbstractController
{
    /**
     * @var Security
     */
    private $security;

    public function __construct(Security $security){
        $this->security = $security;
    }

    /**
     * @Route("/joueur/update/{id}", name="app_joueur")
     */
    public function update($id, ManagerRegistry $doctrine, Request $request): Response
    {
        $manager = $doctrine->getManager();
        $joueur = $manager->getRepository(Joueur::class)->find($id);

        $joueurform = $this->createForm(JoueurType::class, $joueur);
        $joueurform->handleRequest($request);
        if($joueurform->isSubmitted() && $joueurform->isValid()){
            $manager->persist($joueur);
            $manager->flush();
            return $this->redirectToRoute('app_admin');
        }


        return $this->render('joueur/update.html.twig', [
            'controller_name' => 'JoueurController',
            'joueurform' => $joueurform->createView(),
            'joueur' => $joueur,
            'title' => 'Joueur'
        ]);
    }

    /**
     * @Route("/joueur/delete/{id}", name="app_joueur_delete")
     */
    public function delete($id, ManagerRegistry $doctrine){
        $manager = $doctrine->getManager();
        $joueur = $manager->getRepository(Joueur::class)->find($id);
        $joueurConnected = $this->security->getUser();

        if($joueur->getId() == $joueurConnected->getId()){
            return $this->redirectToRoute('app_admin');
        }

        $manager->getRepository(Joueur::class)->remove($joueur);
        $manager->flush();

        return $this->redirectToRoute('app_admin');
    }
}
