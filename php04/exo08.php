<?php

/*

### EXERCICE 08

    CREER UN FICHIER PAR EXERCICE
    exo08.php

    CREER UNE FONCTION QUI PREND EN PARAMETRE UN TABLEAU ORDONNE
    DE CHEMINS D'IMAGE $tabImage
    ET QUI AFFICHE UNE LISTE D'IMAGES EN HTML

    EXEMPLE:
    creerGalerie([ "assets/img/photo1.jpg", "assets/img/photo2.jpg", "assets/img/photo3.jpg" ]);

    ET QUI PRODUIRA LE CODE HTML

    <img src="assets/img/photo1.jpg">
    <img src="assets/img/photo2.jpg">
    <img src="assets/img/photo3.jpg">

    ON POURRA AUSSI UTILISER LA FONCTION glob POUR CONSTRUIRE LE TABLEAU...
    https://www.php.net/manual/fr/function.glob.php


*/

// DEV1
function creerGalerie ($tableau)
{
    $resultat = "";
    foreach($tableau as $image)
    {
        // $resultat = $resultat . '<img src="' . $image . '">' . "\n";
        $resultat = $resultat . 
<<<CODEHTML
<img src="$image" alt="photo">

CODEHTML;

    }

    return $resultat;
}

// DEV2
// echo creerGalerie([ "assets/img/photo1.jpg", "assets/img/photo2.jpg", "assets/img/photo3.jpg" ]);

// GLOB VA CONSTRUIRE LE TABLEAU EN TROUVANT 
// LES FICHIERS QUI CORRESPONDENT AU MASQUE FOURNI EN PARAMETRE
$tableauBillet = glob("billets/*euros.jpg");
echo creerGalerie($tableauBillet);

