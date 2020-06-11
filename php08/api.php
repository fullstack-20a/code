<?php

// CODE PHP POUR TRAITER LES FORMULAIRES
// SI ON FAIT DE LA POO 
// => ON VA RANGER NOTRE CODE DANS DES CLASSES ET DES METHODES
class ApiNewsletter
{
    // METHODES static
    static function create ()
    {
        // DEBUG
        echo "<h5>ON ACTIVE LE CODE DE ApiNewsletter::create</h5>";
        // COMPLETER LE CODE ICI...
    }
}

class ApiContact
{
    // METHODES static
    static function create ()
    {
        // DEBUG
        echo "<h5>ON ACTIVE LE CODE DE ApiContact::create</h5>";
        // COMPLETER LE CODE ICI...
    }

}

// API
// Application Programming Interface

// POINT D'ACCES A VOTRE CODE BACK
// DEPUIS L'EXTERIEUR

// ON VA RECEVOIR LES INFOS ENVOYEES PAR LES FORMULAIRES
//      DE NEWSLETTER       => SQL newsletter
//      DE CONTACT          => SQL contact
// AU FINAL IL FAUT STOCKER LES INFORMATIONS DANS 2 TABLES SQL DIFFERENTES

// <input type="hidden" name="classeCible" value="ApiContact">
// <input type="hidden" name="methodeCible" value="create">
$classeCible  = $_REQUEST["classeCible"];
$methodeCible = $_REQUEST["methodeCible"];
$codeCible    = "$classeCible::$methodeCible";

echo "<h4>ON VEUT ACTIVER LE CODE $codeCible</h4>";
// ON PEUT ACTIVER DU CODE A PARTIR D'UN TEXTE... COOL ;-p
if (is_callable($codeCible))
{
    // TRES DANGEREUX: 
    // ON DONNE LE MOYEN DEPUIS L'EXTERIEUR 
    // D'ACTIVER N'IMPORTE QUELLE METHODE
    // SI OUI ALORS ON VA ACTIVER LE CODE DANS LE TEXTE
    $codeCible();
}

/*
// MAINTENANT JE PEUX DIFFERENCIER LES FORMULAIRE GRACE A CE CODE BARRE
// <input type="hidden" name="codebarre" value="newsletter">
$codebarre = $_REQUEST["codebarre"];

if ($codebarre == "newsletter")
{
    // DEBUG
    echo "(ON DOIT TRAITER LE FORMULAIRE DE NEWSLETTER)";
    // JE VEUX APPELER LA METHODE create DANS LA CLASSE ApiNewsletter
    ApiNewsletter::create();
}

if ($codebarre == "contact")
{
    // DEBUG
    echo "(ON DOIT TRAITER LE FORMULAIRE DE CONTACT)";
    ApiContact::create();
}
*/


// AVEC PHP, PHP VA NOUS METTRE A DISPOSITION LES INFORMATIONS
// DANS $_REQUEST (TOUT LE TEMPS) 
//      ET AUSSI $_POST SI ENVOYE AVEC POST 
//      OU $_GET SI ENVOYE AVEC GET
// DEBUG
echo "<h4>BOITE AUX LETTRES REQUEST</h4>";
echo "<pre>";
print_r($_REQUEST);
echo "</pre>";
/*
echo "<h4>BOITE AUX LETTRES GET</h4>";
echo "<pre>";
print_r($_GET);
echo "</pre>";

echo "<h4>BOITE AUX LETTRES POST</h4>";
echo "<pre>";
print_r($_POST);
echo "</pre>";
*/