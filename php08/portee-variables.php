<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

// EN PHP
$texte = "(coucou)";  // VARIABLE GLOBALE

// ON PEUT AUSSI UTILISER UNE AUTRE ECRITURE POUR DEFINIR UNE VARIABLE GLOBALE
$GLOBALS["maVariable"] = "(ma valeur)";
// $GLOBALS FAIT PARTIE DES VARIABLES SUPER GLOBALES DE PHP
// $_REQUEST, $_GET, $_POST, ... 
// ON PEUT LES UTILISER TOUT LE TEMPS ET PARTOUT

echo $maVariable;
echo $GLOBALS["texte"];

function afficher ()
{
    // ON NE PEUT PAS UTILISER DIRECTEMENT LA VARIABLE GLOBALE
    // Notice: Undefined variable: texte
    // SI ON VEUT UTILISER UNE VARIABLE GLOBALE DANS CETTE FONCTION
    // IL FAUT L'ANNONCER AVEC global
    global $texte;
    echo $texte;

    echo $GLOBALS["maVariable"];

    // PAR DEFAUT, UNE VARIABLE QUI EST CREE DANS LA FONCTION EST LOCALE
    $texte2 = "(hello)";

    // POSSIBLE TECHNIQUE MAIS PAS RECOMMENDE
    global $texte3;
    $texte3 = "(bonjour)";

    // ON PEUT CHANGER LA VALEUR DE LA VARIABLE GLOBALE
    $texte = "(nouvelle valeur)";
}

afficher();
// echo $texte2; // Notice: Undefined variable: texte2
echo $texte3;

echo $texte;

echo "<h4>CONTENU DU TABLEAU ASSOCIATIF</h4>";
echo "<pre>";
print_r($GLOBALS);
echo "</pre>";

?>
    <script>

// EN JS: VARIABLE GLOBALE => VARIABLE DEFINIE EN DEHORS D'UNE FONCTION
var texte = "coucou";
texte3    = "valeur3";     // PLUS SIMPLE DE NE PAS METTRE var

function afficher ()
{
    const toto = 'test';
    // DANS UNE FONCTION ON PEUT CONTINUER A UTILISER LES VARIABLES GLOBALES
    console.log(texte);

    texte2 = "bonjour"; // PAS DE var AU DEBUT => VARIABLE GLOBALE

    // ON PEUT DEFINIR UNE VARIABLE LOCALE EN AJOUTANT var AU DEBUT
    var texte3 = "hello";

    for (let i=0; i<3; i++)
    {
        console.log(i);
    }

    // console.log(i); // Uncaught ReferenceError: i is not defined
    console.log('DANS LA FONCTION: ' + texte3);

    console.log(toto);
}

afficher(); // EN APPELANT LA FONCTION ON DEFINIT LA VARIABLE texte2 QUI EST AUSSI GLOBALE

// console.log(toto); // Uncaught ReferenceError: toto is not defined
console.log(texte2);
console.log(texte3);
// Uncaught ReferenceError: texte3 is not defined

    </script>
</body>
</html>