<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <section>
            <h2>AFFICHAGE DE LA LISTE DES ANNONCES</h2>
            <table>
                <thead>
                    <!-- -->
                </thead>
                <tbody>
<?php
// ON VA CREER UNE LIGNE tr POUR CHAQUE LIGNE SQL DE LA TABLE logement
$requeteSQL =
<<<codesql

SELECT * FROM logement

codesql;
$tabAssoToken = [];     // pas de token

// ENVOYER LA REQUETE SQL (CREATE)
// NE PAS OUBLIER DE CHANGER LE NOM DE LA DATABASE
$dbname             = "immobilier";
$objetPDO           = new PDO("mysql:host=localhost;port=3306;dbname=$dbname;charset=utf8", "root", "");   
$objetPDOStatement  = $objetPDO->prepare($requeteSQL);
$objetPDOStatement->execute($tabAssoToken);

// POUR LE READ ON A DES ETAPES EN PLUS
$tabLigne = $objetPDOStatement->fetchAll(PDO::FETCH_ASSOC);
// ON BOUCLE SUR LE TABLEAU
foreach($tabLigne as $tabColonne)
{
    extract($tabColonne);
    // => CREE LES VARIABLES A PARTIR DES NOMS DES COLONNES SQL
    
    echo
<<<codehtml
    <tr>
        <td>$id_logement</td>
        <td>$titre</td>
        <td>$adresse</td>
        <td>$cp</td>
        <td>$ville</td>
        <td>$prix</td>
        <td>$surface</td>
        <td>$type</td>
        <td>$photo</td>
        <td>$description</td>
    </tr>
codehtml;

}

?>                    
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>