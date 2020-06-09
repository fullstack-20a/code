<?php

/*
### EXERCICE 02

    CREER UN FICHIER PAR EXERCICE
    exo02.php
    
    CREER UNE FONCTION QUI CALCULE LA SURFACE DES 4 MURS
    EN PARAMETRE ON FOURNIRA LES 3 DIMENSIONS
    $longueur
    $largeur 
    $hauteur

    ET ON TESTERA AVEC 
    $longueur = 4
    $largeur  = 3
    $hauteur  = 2
    // RESULTAT ATTENDU: 28m2

    $mur1   = $longueur * $hauteur
    $mur2   = $largeur  * $hauteur
    $mur3   = $longueur * $hauteur
    $mur4   = $largeur  * $hauteur

*/

function calculerSurface ($longueur, $largeur, $hauteur)
{
    $resultat = 2 * ($longueur + $largeur) * $hauteur;
    return $resultat;
}

echo "<h4>version fonction</h4>";
echo calculerSurface(4, 3, 2);


echo "<h4>version par classe</h4>";

class Exo02
{
    static function calculerSurface ($longueur, $largeur, $hauteur)
    {
        $resultat = 2 * ($longueur + $largeur) * $hauteur;
        return $resultat;
    }
    
}

echo Exo02::calculerSurface(4, 3, 2);

echo "<h4>version par objet</h4>";

class Exo02bis
{
    function calculerSurface ($longueur, $largeur, $hauteur)
    {
        $resultat = 2 * ($longueur + $largeur) * $hauteur;
        return $resultat;
    }
    
}

$objet = new Exo02bis;
echo $objet->calculerSurface(4, 3, 2);
