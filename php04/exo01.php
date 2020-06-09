<?php
/*
### EXERCICE 01

    CREER UN FICHIER PAR EXERCICE
    exo01.php

    CREER UNE FONCTION QUI CALCULE LE VOLUME D'UNE PIECE
    EN PARAMETRE ON FOURNIRA LES 3 DIMENSIONS
    $longueur
    $largeur 
    $hauteur

    ET ON TESTERA AVEC 
    $longueur = 4
    $largeur  = 3
    $hauteur  = 2
    // RESULTAT ATTENDU: 24m3

*/

// EN FONCTIONNEL
// ETAPE 1: CREER LA FONCTION
function calculerVolume ($longueur, $largeur, $hauteur)
{
    $resultat = $longueur * $largeur * $hauteur;
    return $resultat;
}

echo "<h4>version fonction</h4>";
// ETAPE2: APPELER LA FONCTION
echo calculerVolume(4, 3, 2);   // $longueur = 4, $largeur = 3, $hauteur = 2

echo "<h4>version par classe</h4>";
class Exo01
{
    // METHODE static DE CLASSE
    static function calculerVolume ($longueur, $largeur, $hauteur)
    {
        $resultat = $longueur * $largeur * $hauteur;
        return $resultat;
    }
    
}

// ETAPE2: APPELER LA FONCTION
echo Exo01::calculerVolume(4, 3, 2);   // $longueur = 4, $largeur = 3, $hauteur = 2


echo "<h4>version par objet</h4>";
class Exo01bis
{
    // METHODE D'OBJET
    function calculerVolume ($longueur, $largeur, $hauteur)
    {
        $resultat = $longueur * $largeur * $hauteur;
        return $resultat;
    }
    
}

$objet = new Exo01bis;
echo $objet->calculerVolume(4, 3, 2);   // $longueur = 4, $largeur = 3, $hauteur = 2


