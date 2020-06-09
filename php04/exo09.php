<?php

/*
### EXERCICE 09

    CREER UN FICHIER PAR EXERCICE
    exo09.php

    CREER UNE FONCTION QUI PREND EN PARAMETRE UN TABLEAU ASSOCIATIF
    ET QUI AFFICHE UN MENU EN HTML

    EXEMPLE:
    creerMenu([ 
        "accueil" => "index.php", 
        "galerie" => "galerie.php", 
        "contact" => "contact.php" 
        ]);

    ET QUI PRODUIRA LE CODE HTML

    <nav>
        <a href="index.php">accueil</a>
        <a href="galerie.php">galerie</a>
        <a href="contact.php">contact</a>
    </nav>

*/

function creerMenu ($listeMenu)
{
    $resultat = "";
    foreach($listeMenu as $cle => $valeur)
    {
        $resultat = $resultat . 
<<<CODEHTML
<a href="$valeur">$cle</a>

CODEHTML;
    }
    
    // ON RAJOUTE LA BALISE nav
    $resultat =
<<<CODEHTML
<nav>
$resultat
</nav>
CODEHTML;

    return $resultat;
}

echo creerMenu([ 
    "accueil" => "index.php", 
    "galerie" => "galerie.php", 
    "contact" => "contact.php" 
    ]);