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

        // RECUPERER LES INFOS DU FORMULAIRE UN PAR UN ET LES FILTRER
        // ENSUITE SI LES INFOS SONT VALIDES
        // SI OUI, ON VA CONSTRUIRE LA REQUETE SQL
        // ET ON VA ENVOYER LES INFOS DANS UNE LIGNE DE LA TABLE SQL newsletter

        // nom ET email
        // <input type="text" name="nom" required placeholder="votre nom">

        // $nom    = Controller::filtrer("nom");         // $name = "nom"
        // $email  = Controller::filtrer("email");       // $name = "email"
        // $tabAssoToken = [ "nom"   => $nom, "email" => $email ];

        $tabAssoToken = [ 
            // COLONNE SQL              INPUT NAME
            "nom"   => Controller::filtrer("nom"), 
            "email" => Controller::filtrer("email")     // VERIFICATION SUR LE FORMAT
        ];

        // TODO: ON DOIT VALIDER QUE LES INFOS SONT CORRECTES
        if (Controller::isOK())
        {
            // TODO...
            // Model::insert("newsletter", $tabAssoToken);

            // MAINTENANT JE PEUX PREPARER MA REQUETE SQL
            $requeteSQL =
<<<CODESQL

INSERT INTO newsletter
( nom, email )
VALUES
( :nom, :email )

CODESQL;

            Model::envoyerRequeteSQL($requeteSQL, $tabAssoToken);
        }
    }

}

class Controller 
{
    static function filtrer ($name)
    {
        $resultat = $_REQUEST[$name] ?? "";
        // IL FAUDRA AJOUTER PLUS DE SECURITE
        // ON ENLEVE LES ESPACES EN TROP (AU DEBUT ET A LA FIN)
        $resultat = trim($resultat);
        // ...
        return $resultat;
    }

    static function isOK ()
    {
        // A COMPLETER
        return true;
    }

}

class Model
{
    static function envoyerRequeteSQL ($requeteSQL, $tabAssoToken)
    {
        $database   = "blog";       // A CHANGER A CHAQUE PROJET    
        $host       = "127.0.0.1";
        $user       = "root";
        $password   = "";           // SAUF AVEC MAMP "root" (A VERIFIER...)
        $port       = "3306";       // MAIS PEUT ETRE AUTRE CHOSE "8889"
        $dsn        = "mysql:host=$host;port=$port;dbname=$database;charset=utf8";    
        $dbh        = new PDO($dsn, $user, $password);
    
        $pdoStatement = $dbh->prepare($requeteSQL);    
        $pdoStatement->execute($tabAssoToken);    
        // $pdoStatement->debugDumpParams();
        return $pdoStatement;  
    }
    
}

// FABRICANT
class Micro
{
    static function cuire ($aliment)
    {
        echo "JE CUIS TEL $aliment";
    }
}

// CLIENT
Micro::cuire("poulet"); // $aliment = "poulet"

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

class Secret
{
    // METHODES static
    static function boom ()
    {
        // DEBUG
        echo "<h5>ON ACTIVE LE CODE DE Secret::boom</h5>";
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

// PHP: PARANOIA HYPER PARANOIA ;-p
// => TOUTE INFORMATION QUI VIENT DE L'EXTERIEUR PEUT ETRE DANGEREUSE
// (ATTAQUE PAR CHEVAL DE TROIE...)
// LES INFOS DE LA METHODE A ACTIVER VIENNENT DU HTML
//      <input type="hidden" name="classeCible" value="ApiContact">
//      <input type="hidden" name="methodeCible" value="create">
$classeCible  = Controller::filtrer("classeCible");     // $name = "classeCible"
$methodeCible = Controller::filtrer("methodeCible");

// PETITE PROTECTION: 
// ON NE DONNE ACCES QU'AUX CLASSES QUI COMMENCENT PAR Api
$codeCible    = "Api$classeCible::$methodeCible";

echo "<h4>ON VEUT ACTIVER LE CODE $codeCible</h4>";
// ON PEUT ACTIVER DU CODE A PARTIR D'UN TEXTE... COOL ;-p
if (is_callable($codeCible))
{
    // TRES DANGEREUX: 
    // ON DONNE LE MOYEN DEPUIS L'EXTERIEUR 
    // D'ACTIVER N'IMPORTE QUELLE METHODE
    // SI OUI ALORS ON VA ACTIVER LE CODE DANS LE TEXTE
    // EXEMPLE: $codeCible = "ApiNewsletter::create";
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