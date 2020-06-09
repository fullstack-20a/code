<?php
/*
### EXERCICE 07

    CREER UN FICHIER PAR EXERCICE
    exo07.php

    CREER UNE FONCTION QUI RENVOIE 
    UN TEXTE CONCATENANT LES VALEURS D'UN TABLEAU DE LETTRES
    EN SEPARANT CHAQUE LETTRE AVEC UNE VIRGULE
    EN PARAMETRE, ON FOURNIRA UN TABLEAU DE LETTRES
    $tabLettre

    ET ON TESTERA AVEC 
    $tabLettre = [ "a", "b", "c", "d" ];

    // RESULTAT ATTENDU "a,b,c,d"
    // ATTENTION: PAS DE VIRGULE AU DEBUT OU A LA FIN

*/

function toStr ($tabLettre)
{
    $str = "";
    foreach($tabLettre as $index => $lettre)
    {
        // $str .= $lettre;
        $str = $str . $lettre ;
        if ($index < count($tabLettre) -1)  // SI ON N'EST PAS SUR L'INDICE DU DERNIER
        {
            // $str = $str . ',';
            $str = "$str, ";
        }
    }
    return $str;
}

echo "<h4>DERNIER</h4>";
echo toStr([ "a", "b", "c", "d" ]);

echo "<h4>PREMIER</h4>";

function toStr2 ($tabLettre)
{
    $str = "";
    // foreach($tabLettre as $lettre)   // PHP FAIT $lettre = "a" ET ENSUITE $lettre = "b" ETC...
    foreach($tabLettre as $index => $lettre)
    {
        // $str = $str . "," . $lettre;
        if ($index > 0)
        {
            $str = $str . ",";
        }
        $str = $str . $lettre;
    }
    return $str;
}

echo toStr2([ "a", "b", "c", "d" ]);

echo "<h4>PHP implode</h4>";
// https://www.php.net/manual/fr/function.implode.php
echo implode(", ", [ "a", "b", "c", "d" ]);

