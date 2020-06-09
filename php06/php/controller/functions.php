<?php

// ON VA CODER LA PAGE ADMIN QUI PERMETTRA DE CREER UN NOUVEL ARTICLE
// $requeteSQL PEUT AVOIR DES TOKENS
// $tabAssoToken FOURNIRA LES VALEURS DE CES TOKENS
function envoyerRequeteSQL ($requeteSQL, $tabAssoToken)
{
    // POUR CONNECTER PHP A SQL
    // ON VA DEVOIR PASSER PAR PAS MAL D'ETAPES UN PEU LOURD...
    // HISTORIQUEMENT IL Y A PLUSIEURS MOYENS POUR SE CONNECTER
    // => VERSION PREFEREE ACTUELLE AVEC PDO
    // Php Data Objects
    // => PROGRAMMATION ORIENTE OBJET
    // https://www.php.net/manual/fr/book.pdo.php
    // https://www.php.net/manual/fr/class.pdo.php

    $database   = "blog";       // A CHANGER A CHAQUE PROJET

    $host       = "127.0.0.1";
    $user       = "root";
    $password   = "";           // SAUF AVEC MAMP "root" (A VERIFIER...)
    $port       = "3306";       // MAIS PEUT ETRE AUTRE CHOSE "8889"

    // Data Source Name (DSN)
    // ATTENTION: IL FAUT PRECISER charset=utf8 (SANS -)
    $dsn        = "mysql:host=$host;port=$port;dbname=$database;charset=utf8";

    // ON CREE LA CONNEXION ENTRE PHP ET MySQL
    $dbh        = new PDO($dsn, $user, $password);

    // ENSUITE ON VA AJOUTER LA REQUETE DANS LA CONNEXION
    // https://www.php.net/manual/fr/pdo.prepare.php
    // prepare NOUS RENVOIE UN AUTRE OBJET $pdoStatement QUI SERVIRA A EXECUTER LA REQUETE SQL
    $pdoStatement = $dbh->prepare($requeteSQL);

    // ENFIN ON EXECUTE LA REQUETE SQL
    $pdoStatement->execute($tabAssoToken);

    // A ACTIVER POUR DEBUG
    // $pdoStatement->debugDumpParams();

    // ON DOIT RAJOUTER UN RETURN POUR LE CAS DE LA LECTURE
    return $pdoStatement;

}

// ETAPE1: DECLARER LA FONCTION => LE CODE EST EN ATTENTE
// $param1 VA FOURNIR LE TABLEAU ASSOCIATIF POUR LES TOKENS
function insererArticle ($param1)
{
    // MAINTENANT, ON VA POUVOIR ENVOYER DES REQUETES SQL DEPUIS PHP VERS MySQL
    // ON UTILISE DES JETONS/TOKENS :titre, :photo, :description
    // => PROTECTION CONTRE DES ATTAQUES PAR INJECTIONS SQL... (PLUS TARD...)
    $requeteSQL =
<<<CODESQL

INSERT INTO article
( titre, photo, description )
VALUES
( :titre, :photo, :description ) 

CODESQL;

    // ET MAINTENANT JE PEUX APPELER LA FONCTION POUR ENVOYER LA REQUETE SQL
    envoyerRequeteSQL($requeteSQL, $param1);

}

// ETAPE1: DECLARER LA FONCTION => CODE EN ATTENTE
function afficherArticles ()
{

    $requeteSQL =
<<<CODESQL
    
    SELECT * FROM article
    ORDER BY id DESC

CODESQL;
    
    $param1 = [];   // ON N'A PAS DE JETON/TOKEN DANS LA REQUETE SQL => TABLEAU VIDE

    // JE PEUX ENVOYER LA REQUETE SQL POUR FAIRE LA LECTURE
    $pdoStatement = envoyerRequeteSQL($requeteSQL, $param1);

    // AVEC LA LECTURE 
    // ON A UNE ETAPE SUPPLEMENTAIRE POUR RECUPERER DANS PHP LES INFOS
    // => TRANFERT DES INFOS DE SQL DANS LE MONDE PHP
    $tabLigne = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    
    // DEBUG
    echo "<pre>";
    print_r($tabLigne);
    echo "</pre>";

    // EXERCICE : AJOUTER UNE BOUCLE POUR AFFICHER DU CODE HTML PLUS REALISTE...
    
}

function envoyerArticle ()
{
    // CODE POUR TRAITER LE FORMULAIRE
    // print_r($_REQUEST);
    // print_r($_POST);
    // ETAPE2: APPELER LA FONCTION => ACTIVER LE CODE DE LA FONCTION
    /*
    $tabAsso = [
        "titre"         => "test1447",
        "photo"         => "photo1447",
        "description"   => "description1447",
    ];
    */
    // ON N'INSERE UNE NOUVELLE LIGNE QUE SI ON A RECU DES INFOS DE FORMULAIRE
    if (!empty($_POST))
    {
        // LE FORMULAIRE FOURNIT LES INFOS POUR PHP
        // ET ENSUITE PHP LES TRANSMET A SQL
        $tabAsso = $_POST;
        // ON INSERE LES INFOS DU FORMULAIRE DANS LA TABLE SQL article
        insererArticle($tabAsso);   // PHP FAIT $param1 = $ligne1 
    }

}

// ON VA COMMENCER PAR CREER LE HTML POUR article ET h2 
/*
    <article>
        <h2>titre1</h2>
        <img src="assets/img/photo1.jpg" alt="photo">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla est modi quaerat nihil itaque culpa. Cumque, nemo non. Quam et aperiam similique eius rerum aliquid, laboriosam veniam animi odio molestias!</p>
    </article>
    <article>
        <h2>titre2</h2>
        <img src="assets/img/photo2.jpg" alt="photo">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla est modi quaerat nihil itaque culpa. Cumque, nemo non. Quam et aperiam similique eius rerum aliquid, laboriosam veniam animi odio molestias!</p>
    </article>
    <article>
        <h2>titre3</h2>
        <img src="assets/img/photo3.jpg" alt="photo">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla est modi quaerat nihil itaque culpa. Cumque, nemo non. Quam et aperiam similique eius rerum aliquid, laboriosam veniam animi odio molestias!</p>
    </article>
*/

function creerBlog ($tableauArticle)
{
    $resultat = ""; // ON MANIPULE DU TEXTE => TEXTE VIDE POUR DEBUTER

    // ON PARCOURT LE TABLEAU ORDONNE
    foreach($tableauArticle as $indice => $tabAsso)
    {
        // DEBUG
        // print_r($tabAsso);

        // JE VEUX RECUPERER LA VALEUR QUI EST ASSOCIEE AVEC LA CLE "titre"
        $titre       = $tabAsso["titre"];
        $photo       = $tabAsso["photo"];
        $description = $tabAsso["description"];

        $resultat = $resultat . 
<<<CODEHTML
<article>
    <h2>$titre</h2>
    <img src="$photo" alt="photo">
    <p>$description</p>
</article>

CODEHTML;

    }
    return $resultat;
}

// ON A UN TABLEAU ORDONNE DONT CHAQUE ELEMENT EST UN TABLEAU ASSOCIATIF
/*
$tableauArticle = [ 
    [ "titre" => "titre1", "photo" => "assets/img/photo1.jpg", "description" => "description1" ], 
    [ "titre" => "titre2", "photo" => "assets/img/photo2.jpg", "description" => "description2"  ], 
    [ "titre" => "titre3", "photo" => "assets/img/photo3.jpg", "description" => "description3"  ], 
];
*/
function recupererArticles ()
{
    // ENVOYER UNE REQUETE SQL EN LECTURE 
    // ET ENSUITE RECUPERER LA LISTE DES LIGNES 
    // SOUS LA FORME D'UN TABLEAU ORDONNE DE TABLEAUX ASSOCIATIFS
    $requeteSQL =
<<<CODESQL

SELECT * FROM article
ORDER BY id DESC
;

CODESQL;
    $tabAssoToken = [];     // VIDE CAR ON N'A PAS DE TOKEN

    // ENVOYER LA REQUETE SQL
    $pdoStatement = envoyerRequeteSQL($requeteSQL, $tabAssoToken);

    // COOL: fetchAll VA ME CREER LE TABLEAU DE TABLEAU ;-p
    $resultat = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

    return $resultat;
}

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
