<?php

class MaClasse
{
    // PROPRIETES

    // METHODES
    function faireTravail ()
    {
        // AJOUTER NOTRE CODE ICI...
    }

}

$objet = new MaClasse;
$objet->faireTravail();

// CLASSES ABSTRAITES
// IL MANQUE DU CODE DANS LA CLASSE...
// Fatal error: Class MaClasseAbstraite contains 1 abstract method 
// and must therefore be declared abstract or implement the remaining methods
abstract class MaClasseAbstraite
{
    // METHODE STATIQUE (CLASSE)
    static function afficherTexte ()
    {
        echo "COUCOU";
    }

    abstract static function afficherTexte2 ();

    // PROPRIETES

    // METHODES
    function faireTravail ()
    {
        // AJOUTER NOTRE CODE ICI...
    }

    // DANS UNE CLASSE ABSTRAITE ON PEUT AJOUTER UNE METHODE
    // SANS {}
    abstract function faireTache ();

}

// PHP REFUSE DE CREER UN OBJET A PARTIR D'UNE CLASSE ABSTRAITE 
// CAR ELLE EST INCOMPLETE
// $objet2 = new MaClasseAbstraite;    // ERREUR PHP...
// Fatal error: Uncaught Error: Cannot instantiate abstract class MaClasseAbstraite

// LES METHODES STATIC PEUVENT ETRE UTILISEES
MaClasseAbstraite::afficherTexte();