<?php


namespace App\Entity;


class Arme
{
    public $type;
    public $dommages;
    public $description;
    public static $armes=[];

    public function __construct($type, $dommages, $description)
    {
        $this->type = $type;
        $this->dommages = $dommages;
        $this->description = $description;
        self::$armes[] = $this;
    }

    public static function creerArme()
    {
        $epee = new Arme('Epee', 3, 'Attaque et maniabilité moyenne, l\'épée est une arme polyvalente');
        $hache = new Arme('Hache', 5, 'Arme lourde, peu maniable mais forts dégats ');
        $arc = new Arme('Arc', 2, 'Très efficace à distance, mais laisse vulnérable au corps à corps');

    }

    public static function getArmeParType($type)
    {
        foreach(self::$armes as $arme) {
            if (strtolower($arme->type) === strtolower($type)){
                return $arme;
            }
        }
    }

}