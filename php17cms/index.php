<?php

// EN PHP
// ON PEUT CONNAITRE L'URL DEMANDEE PAR LE NAVIGATEUR
$uri = $_SERVER["REQUEST_URI"];
// ON VA FILTRER CETTE URI POUR EXTRAIRE LE BOUT QUI NOUS INTERESSE
// https://www.php.net/manual/fr/function.parse-url.php
// https://www.php.net/manual/fr/function.pathinfo.php
extract(parse_url($uri));
// => CREE DES VARIABLES DONT $path

// CAS SPECIAL: /wf3/php17cms/
// ON DOIT TRADUIRE PAR /wf3/php17cms/index.php
// APACHE GERAIT CE CAS SPECIAL
// MAIS MAINTENANT PHP DOIT GERER CE CAS
$dossierRacine = "/wf3/php17cms/";
if ($path == $dossierRacine)
{
    $path = $dossierRacine . "index.php";
}

extract(pathinfo($path));
// => CREE DES VARIABLES DONT $filename

// echo "<h1>LA PAGE DEMANDEE EST $uri</h1>";
// echo "<h1>LE PATH DEMANDE EST $path</h1>";



echo "<h1>LE FILENAME DEMANDE EST $filename</h1>";

// URI      /wf3/php17cms/contact.html?param1=valeur1
// PATH     /wf3/php17cms/contact.html
// FILENAME contact

// CODE PHP POUR UN READ
$requeteSQL =
<<<codesql

SELECT * 
FROM page
WHERE 
    filename = :filename

codesql;

$tabAssoToken = [ "filename" => $filename ];

// CONNEXION A LA DATABASE MYSQL
// https://www.php.net/manual/fr/pdo.construct.php
// ON INSTANCIE UN OBJET A PARTIR DE LA CLASSE PDO (DEJA FOURNIE...)
//      ET ON PASSE 3 PARAMETRES A LA METHODE MAGIQUE __construct
$objetPDO = new PDO("mysql:host=localhost;port=3306;dbname=cms;charset=utf8", "root", "");   
                // PHP APPELLE AUTOMATIQUEMENT __construct()

// MAINTENANT QU'ON A UN OBJET DE LA CLASSE PDO
// ON PEUT L'UTILISER POUR APPELER DES METHODES DE LA CLASSE PDO
// https://www.php.net/manual/fr/pdo.prepare.php
$objetPDOStatement = $objetPDO->prepare($requeteSQL);
// LA METHODE prepare RENVOIE COMME VALEUR DE RETOUR UN OBJET DE LA CLASSE PDOStatement

// AVEC L'OBJET DE LA CLASSE PDOStatement ON PEUT APPELER LA METHODE execute
// https://www.php.net/manual/fr/pdostatement.execute.php
$objetPDOStatement->execute($tabAssoToken);

// POUR UN READ
// JE VAIS RECUPERER LES INFOS DANS UN TABLEAU ORDONNE DE TABLEAU ASSOCIATIF
// https://www.php.net/manual/fr/pdostatement.fetchall.php
$tabLigne = $objetPDOStatement->fetchAll(PDO::FETCH_ASSOC);

foreach($tabLigne as $tabColonne)
{
    extract($tabColonne);
    // CREE DES VARIABLES $contenu
    // MAIS N'EXECUTE PAS DU CODE PHP

    echo 
<<<codehtml

    <article>
        <h2>$titre</h2>
        <div>$contenu</div>
        <p>$photo</p>
    </article>

codehtml;

}


