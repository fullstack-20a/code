<?php

trait MonTrait
{
    // PROPRIETES

    // METHODES
    function faireTravail ()
    {
        // AJOUTER CODE ICI...
    }
}

trait MonTrait2
{
    function faireTravail ()
    {
        // AJOUTER CODE ICI...
    }

}

class MaClasse
{
    // ATTENTION: A L'INTERIEUR DU {}
    // ON COMPOSE LE CODE DE MaClasse AVEC LE CODE DE MonTrait
    // => ON OBTIENT LE MEME RESULTAT QU'AVEC L'HERITAGE extends
    // PAS DE PRIORITE DANS L'ORDRE
    use MonTrait, MonTrait2;
}

// $objet = new MonTrait;  // ERREUR => PHP VA BLOQUER

$objet = new MaClasse;
// Fatal error: 
// Trait method faireTravail has not been applied, 
// because there are collisions with other trait methods on MaClasse
// $objet->faireTravail();


