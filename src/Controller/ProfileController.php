<?php

namespace App\Controller;

use App\Entity\Joueur;
use App\Entity\Note;
use App\Form\Type\NoteType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class ProfileController extends AbstractController
{
    /**
     * @var Security
     */
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }


    /**
     * @Route("/profile", name="app_profile")
     */
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        $manager = $doctrine->getManager();

        $joueur = $this->security->getUser();
        $ajout = false;

        $note = new Note();
        $joueurs = $this->getDoctrine()->getRepository(Joueur::class)->findBy(array('username' => $joueur->getUserIdentifier()));
        $joueur = $joueurs[0];
        $note->setJoueur($joueur);

        $noteform = $this->createForm(NoteType::class, $note);
        $noteform->handleRequest($request);

        if($noteform->isSubmitted() && $noteform->isValid()){
            $manager->persist($note);

            $ajout = true;
            $joueur->setHp($joueur->getHp() + $note->getNote());
            $manager->persist($joueur);

            $manager->flush();
            return $this->redirectToRoute("app_profile");
        }


        $notes = $joueur->getNotes();

        return $this->render('profile/index.html.twig', [
            'controller_name' => 'ProfileController',
            'title' => 'Profil',
            'joueur' => $joueur,
            'noteform' => $noteform->createView(),
            'ajout' => $ajout,
            'notes' => $notes,
        ]);
    }
}
