<?php

/*
### EXERCICE 03

CREER UN FICHIER PAR EXERCICE
exo03.php

CREER UNE FONCTION QUI CALCULE LE PLUS PETIT (OU EGAL) ENTRE 2 NOMBRES
EN PARAMETRE, ON FOURNIRA LES 2 NOMBRES
$nombre1
$nombre2

ET ON TESTERA AVEC 
$nombre1 = 10
$nombre2 = 20
// RESULTAT ATTENDU 10
*/

function calculerPlusPetitNombre ($nombre1, $nombre2)
{
    if ($nombre1 <= $nombre2)
    {
        return $nombre1;
    }
    else 
    {
        return $nombre2;
    }
}

echo "<h4>version fonction</h4>";

echo calculerPlusPetitNombre(10, 20);


echo "<h4>version par classe</h4>";

class Exo03
{
    static function calculerPlusPetitNombre ($nombre1, $nombre2)
    {
        if ($nombre1 <= $nombre2)
        {
            return $nombre1;
        }
        else 
        {
            return $nombre2;
        }
    }
    
}

echo Exo03::calculerPlusPetitNombre(10, 20);


echo "<h4>version par objet</h4>";

class Exo03bis
{
    function calculerPlusPetitNombre ($nombre1, $nombre2)
    {
        if ($nombre1 <= $nombre2)
        {
            return $nombre1;
        }
        else 
        {
            return $nombre2;
        }
    }
    
}

$objet = new Exo03bis;
echo $objet->calculerPlusPetitNombre(10, 20);
