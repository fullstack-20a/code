<?php
/*
### EXERCICE 04

    CREER UN FICHIER PAR EXERCICE
    exo04.php
    
    CREER UNE FONCTION QUI CALCULE LE PLUS PETIT ENTRE 3 NOMBRES
    EN PARAMETRE, ON FOURNIRA LES 3 NOMBRES
    $nombre1
    $nombre2
    $nombre3

    ET ON TESTERA AVEC 
    $nombre1 = 10
    $nombre2 = 2
    $nombre3 = 7
    // RESULTAT ATTENDU 2

    ET ON TESTERA AVEC 
    $nombre1 = 1
    $nombre2 = 7
    $nombre3 = 19
    // RESULTAT ATTENDU 1

    ET ON TESTERA AVEC 
    $nombre1 = 12
    $nombre2 = 71
    $nombre3 = 9
    // RESULTAT ATTENDU 9

*/

function calculerPlusPetit ($nombre1, $nombre2, $nombre3)
{
    if (($nombre1 < $nombre2) && ($nombre1 < $nombre3))
    {
        return $nombre1;
    }
    else if (($nombre2 < $nombre1) && ($nombre2 < $nombre3))
    {
        return $nombre2;
    }
    else
    {
        return $nombre3;
    }
}

echo "<h4>version fonction</h4>";
echo calculerPlusPetit(10, 15, 20);

echo "<h4>version par classe</h4>";

class Exo04
{
    static function calculerPlusPetit ($nombre1, $nombre2, $nombre3)
    {
        if (($nombre1 < $nombre2) && ($nombre1 < $nombre3))
        {
            return $nombre1;
        }
        else if (($nombre2 < $nombre1) && ($nombre2 < $nombre3))
        {
            return $nombre2;
        }
        else
        {
            return $nombre3;
        }
    }
    
}

echo Exo04::calculerPlusPetit(10, 15, 20);


echo "<h4>version par objet</h4>";

class Exo04bis
{
    function calculerPlusPetit ($nombre1, $nombre2, $nombre3)
    {
        if (($nombre1 < $nombre2) && ($nombre1 < $nombre3))
        {
            return $nombre1;
        }
        else if (($nombre2 < $nombre1) && ($nombre2 < $nombre3))
        {
            return $nombre2;
        }
        else
        {
            return $nombre3;
        }
    }
    
}

$objet = new Exo04bis;
echo $objet->calculerPlusPetit(10, 15, 20);

