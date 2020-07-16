<?php


namespace App\Entity;


class Personnage
{
     public $pseudo;
     public $age;
     public $temperament;
     public $carac = [];

     public static $personnages=[];

     public function __construct($pseudo, $age, $temperament, $carac)
     {
         $this->pseudo = $pseudo;
         $this->age = $age;
         $this->temperament = $temperament;
         $this->carac = $carac;
         self::$personnages[] = $this;
     }

     public static function  creerPersonnages()
     {
         $p1 = new Personnage("Marc", 25, 'Beliqueux', [
             "force" => 3,
             "constitution" => 4,
             "agi" => 2,
             "intel" => 2,
         ]);
         $p2 = new Personnage("Milo", 32, 'Calme', [
             "force" => 5,
             "constitution" => 3,
             "agi" => 1,
             "intel" => 1,
         ]);
         $p3 = new Personnage("Tya", 22, 'Audacieuse', [
             "force" => 1,
             "constitution" => 2,
             "agi" => 5,
             "intel" => 4,
         ]);
     }

     public static function getPersonnageParPseudo($pseudo)
     {
         foreach(self::$personnages as $perso){
             if (strtolower($perso->pseudo) === $pseudo){
                 return $perso;
             }
         }
     }
}