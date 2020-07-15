<?php

// DEV1
class MaClasseParent
{
    // PROPRIETES
    public $prop1 = "VALEUR PARENT";

    // METHODES
    function faireTravail ()
    {
        echo "<h4>MaClasseParent::faireTravail</h4>";
        echo $this->prop1;
    }
}

// DEV2
class MaClasseEnfant 
        extends MaClasseParent
{
    // PROPRIETES
    // A EVITER DE RECREER DES PROPRIETES AVEC LE MEME NOM QUE LES PROPRIETES PARENTES
    // public $prop1 = "VALEUR ENFANT";

    // METHODES
    function faireTravail ()
    {
        echo "<h4>MaClasseEnfant::faireTravail AVANT</h4>";
        echo $this->prop1;

        // SI ON VEUT APPELER LA METHODE DU PARENT
        parent::faireTravail();

        echo "<h4>MaClasseEnfant::faireTravail APRES</h4>";
    }

}

$objet = new MaClasseEnfant;
$objet->faireTravail();         // ??? PHP VA APPELER QUELLE METHODE ?
                                // $objet EST DE LA CLASSE MaClasseEnfant
                                // => PHP DONNE LA PRIORITE A MaClasseEnfant
                                // => "<h4>MaClasseEnfant::faireTravail</h4>"
