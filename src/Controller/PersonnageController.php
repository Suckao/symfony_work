<?php

namespace App\Controller;

use App\Entity\Personnage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM;

class PersonnageController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index()
    {
        return $this->render('personnage/index.html.twig');
    }

    /**
     * @Route("/persos", name="persos")
     */
    public function persos()
    {
        Personnage::creerPersonnages();
        return $this->render('personnage/persos.html.twig', [
            'players' => Personnage::$personnages
        ]);
    }

    /**
     * @Route("/persos/{pseudo}", name="detail_perso")
     */
    public function afficherPerso($pseudo)
    {
        Personnage::creerPersonnages();
        $perso = Personnage::getPersonnageParPseudo(strtolower($pseudo));
        return $this->render('personnage/detail.html.twig', [
            'perso' => $perso,
        ]);
    }
}
