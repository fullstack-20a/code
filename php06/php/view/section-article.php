
<section>
    <h2>PAGE POUR AFFICHER UN SEUL ARTICLE</h2>
<?php
// AVEC PHP JE PEUX RECUPERER CES INFOS ENVOYEES PAR LES FORMULAIRES
// PHP CREE LA VARIABLE $_REQUEST AVEC COMME VALEUR UN TABLEAU ASSOCIATIF
// ET REMPLIT LE TABLEAU ASSOCIATIF AVEC LES INFOS RECUES DES FORMULAIRES
echo "<h4>BOITE RECEPTION GET</h4>";
print_r($_GET);
echo "<h4>BOITE RECEPTION POST</h4>";
print_r($_POST);
echo "<h4>BOITE RECEPTION REQUEST</h4>";
print_r($_REQUEST);

// $_REQUEST EST UN TABLEAU ASSOCIATIF
// ON VA RECUPERER L'INFORMATION DE id DANS LE TABLEAU ASSOCIATIF
$id = $_REQUEST["id"] ?? "";    // PROTECTION EN CAS DE MANQUE

// DEBUG
echo "ON DOIT AFFICHER L'ARTICLE QUI A id = $id";

/*
QUELLE EST LA REQUETE SQL ???

SELECT * FROM article
WHERE id = :id

[ "id" => $id ]

*/

$requeteSQL =
<<<CODESQL

SELECT * FROM article
WHERE id = :id

CODESQL;

$tabAssoToken = [ "id" => $id ];

$pdoStatement = envoyerRequeteSQL($requeteSQL, $tabAssoToken);

echo "<h4>PDOSTATEMENT</h4>";

// https://www.php.net/manual/fr/function.var-dump.php
var_dump($pdoStatement);

// https://www.php.net/manual/fr/pdostatement.fetchall.php
$tabResultat = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

echo "<h4>RESULTAT DE LA REQUETE SQL</h4>";
echo "<pre>";
// DEBUG 
print_r($tabResultat);
echo "</pre>";


?>
<div class="ligne">
    <?php echo creerBlog($tabResultat) ?>
</div>
</section>