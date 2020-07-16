<?php

namespace App\Controller;

use App\Entity\Arme;
use App\Entity\Personnage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArmeController extends AbstractController
{
    /**
     * @Route("/arme", name="armes")
     */
    public function index()
    {
        Arme::creerArme();
        return $this->render('arme/index.html.twig', [
            'weapons' => Arme::$armes,
        ]);
    }

    /**
     * @Route("/arme/{type}", name="detail_weapon")
     */
    public function afficherArme($type)
    {
        Arme::creerArme();
        $arme = Arme::getArmeParType(strtolower($type));
        return $this->render('arme/detail.html.twig', [
            'weapon' => $arme
        ]);
    }
}
