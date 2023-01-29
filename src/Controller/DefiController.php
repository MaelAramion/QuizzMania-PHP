<?php

namespace App\Controller;

use App\Entity\Defi;
use App\Entity\Joueur;
use App\Entity\Question;
use App\Entity\Reponse;
use App\Form\Type\DefiType;
use App\Form\Type\ReponseType;
use App\Repository\DefiRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Validator\Constraints\DateTime;

class DefiController extends AbstractController
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
     * @Route("/defi", name="app_defi")
     */
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        $manager = $doctrine->getManager();

        $erreur = "";

        // Récupère le joueur connecté
        $joueur = $this->security->getUser();
        $joueurs = $this->getDoctrine()->getRepository(Joueur::class)->findBy(array('username' => $joueur->getUserIdentifier()));
        $joueur = $joueurs[0];

        $defi = new Defi();
        // Récupère les défis du joueur
        $defis = $manager->getRepository(Defi::class)->getDefisOfPlayer($joueur);

        $defiform = $this->createForm(DefiType::class, $defi);
        $defiform->handleRequest($request);

        if ($defiform->isSubmitted() && $defiform->isValid()) {
            $defi->setJoueurOrigin($joueur);

            if ($defi->getJoueurDestinataire() == $defi->getJoueurOrigin()) {
                $erreur = "Erreur : Vous vous êtes sélectionné en tant que joueur cible";
            } else {
                $manager->persist($defi);
                $manager->flush();
                return $this->redirectToRoute("app_defi");
            }
        }

        return $this->render('defi/index.html.twig', [
            'controller_name' => 'DefiController',
            'title' => 'Défier',
            'defiform' => $defiform->createView(),
            'erreur' => $erreur,
            'defis' => $defis,
        ]);
    }

    /**
     * @Route ("/defi/repondre/{id}")
     */
    public function repondre($id, ManagerRegistry $doctrine, Request $request): Response
    {
        $manager = $doctrine->getManager();

        $joueur = $this->security->getUser();
        $joueurs = $this->getDoctrine()->getRepository(Joueur::class)->findBy(array('username' => $joueur->getUserIdentifier()));
        $joueur = $joueurs[0];


        $defi = $manager->getRepository(Defi::class)->find($id);
        $question = $defi->getQuestion();
        $reponses = $question->getReponses();



        // Pour éviter que le joueur réponde au défi d'un autre joueur en modifiant l'url
        if ($defi->getJoueurDestinataire() == $joueur) {
            return $this->render('defi/repondre.html.twig', [
                'controller_name' => 'DefiController',
                'title' => 'Répondre',
                'defi' => $defi,
                'question' => $question,
                'reponses' => $reponses,
            ]);
        } else {
            return $this->redirectToRoute("app_defi");
        }

    }

    /**
     * @Route ("/defi/submit/{id}")
     */
    public function submitReponse($id, ManagerRegistry $doctrine, Request $request): Response
    {
        $manager = $doctrine->getManager();
        $defi = $doctrine->getRepository(Defi::class)->find($id);

        $reponse = new Reponse();

        $form = $this->createForm(ReponseType::class, $reponse);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $reponse = $doctrine->getRepository(Reponse::class)->find($request->get('reponse'));
            $joueur = $defi->getJoueurDestinataire();


            // Vérifie si la question est la même que celle de la réponse
            if ($defi->getQuestion()->getId() == $reponse->getQuestion()->getId()) {
                if ($reponse->IsValid()) {
                    $joueur->setHp($joueur->getHp() + $defi->getQuestion()->getPoints());
                } else {
                    $joueur->setHp($joueur->getHp() - $defi->getQuestion()->getPoints());
                }

                $defi->setDateReponse(new \DateTime());
                $manager->persist($joueur);
                $manager->persist($defi);
                $manager->flush();
            }
        }


        return $this->redirectToRoute("app_defi");
    }
}
