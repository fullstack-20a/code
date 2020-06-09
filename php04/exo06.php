<?php

/*

### EXERCICE 06

    CREER UN FICHIER PAR EXERCICE
    exo06.php
    
    CREER UNE FONCTION QUI CALCULE LA SOMME DES VALEURS DANS UN TABLEAU DE NOMBRES
    EN PARAMETRE, ON FOURNIRA UN TABLEAU DE NOMBRES
    $tabNombre

    ET ON TESTERA AVEC 
    $tabNombre = [ 12, 3, 45, 1, 100, 35 ];

    // RESULTAT ATTENDU 196

*/

function calculerSomme ($tabNombre)
{
    $somme = 0;     // ASTUCE AU DEPART LA SOMME EST ZERO
    foreach($tabNombre as $nombre)
    {
        // $somme += $nombre;
        $somme = $somme + $nombre;
    }
    return $somme;
}

echo calculerSomme([ 12, 3, 45, 1, 100, 35 ]);