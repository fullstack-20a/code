<?php

/*
### EXERCICE 05

    CREER UN FICHIER PAR EXERCICE
    exo05.php
    
    CREER UNE FONCTION QUI TROUVE LA PLUS PETITE VALEUR DANS UN TABLEAU DE NOMBRES
    EN PARAMETRE, ON FOURNIRA UN TABLEAU DE NOMBRES
    $tabNombre

    ET ON TESTERA AVEC 
    $tabNombre = [ 12, 3, 45, 1, 100, 35 ];

    // RESULTAT ATTENDU 1

*/

echo "<h4>avant déclaration</h4>";

// CODE EN ATTENTE => PHP S'EN FICHE
// AU MOMENT DE L'APPEL DE LA FONCTION
// IL FAUDRA FOURNIR UN TABLEAU COMME VALEUR DU PARAMETRE $tableau
function trouverPlusPetit ($tableau)    // $tableau EST POUR LE MOMENT UNE BOITE VIDE
{
    echo "<h4>debut code fonction</h4>";
    $petit = $tableau[0];   // ASTUCE: ON PREND LE PREMIER ELEMENT COMME VALEUR INITIALE
    foreach($tableau as $valeur)
    {
        if ($valeur < $petit)
        {
            $petit = $valeur;   // LE PLUS PETIT EST REMPLACE PAR LA VALEUR QU'ON VIENT DE TROUVER
        }
    }

    echo "<h4>fin code fonction</h4>";
    // A LA FIN, ON A PARCOURU TOUS LES NOMBRES
    return $petit;
}

// MOMENT IMPORTANT:
// ON APPELLE LA FONCTION
// => PHP ACTIVE LE CODE 
// => IL FAUT MAINTENANT DONNER LA BONNE VALEUR AU PARAMETRE $tableau
echo "<h4>avant appel</h4>";
echo trouverPlusPetit([ 12, 3, 45, 1, 100, 35 ]);
        // PHP FAIT $tableau = [ 12, 3, 45, 1, 100, 35 ]
        // ET ENSUITE PHP EXECUTE LE CODE DE LA FONCTION => LIGNE 24
echo "<h4>après appel</h4>";

// $tableau = [ 12, 3, 45, 1, 100, 35 ];
// echo trouverPlusPetit();


// PHP A UNE FONCTION POUR FAIRE LA MEME CHOSE
// https://www.php.net/manual/fr/function.min.php
