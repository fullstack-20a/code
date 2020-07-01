<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <nav>
            <a href="inscription.php">inscription</a>
            <a href="contenu.php">contenu</a>
        </nav>
    </header>
    <main>
        <section>
            <h2>FORMULAIRE DE CREATE SUR contenu</h2>
            <!-- NE PAS OUBLIER ATTRIBUT enctype SI UPLOAD SANS AJAX -->
            <form action="api-contenu.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="titre" required placeholder="titre">
                <textarea name="description" cols="80" rows="8" required placeholder="description"></textarea>
                <!-- SANS required CAR optionnel -->
                <input type="file" name="photo" placeholder="photo">
                <input type="number" name="id_user" required placeholder="id_user">
                <button type="submit">PUBLIER UN CONTENU</button>
            </form>
        </section>

        <section>
            <h2>LISTE DES CONTENUS AVEC LE login DE L'AUTEUR</h2>
            <table>
                <thead>
                    <!-- AJOUTER LES TITRES DES COLONNES -->
                    <tr>
                        <td>idcontenu</td>
                        <td>titre</td>
                        <td>description</td>
                        <td>photo</td>
                        <td>id_user</td>
                        <td>login</td>
                    </tr>
                </thead>
                <tbody>
<?php
// ON VA CREER UNE LIGNE tr POUR CHAQUE LIGNE SQL DE LA TABLE contenu

// astuce: 
// on peut ajouter des colonnes supplémentaires et choisir le nom de ces colonnes
// SELECT *, contenu.id as idcontenu FROM contenu

$requeteSQL =
<<<codesql

SELECT *, contenu.id as idcontenu FROM contenu
INNER JOIN user
    ON contenu.id_user = user.id

codesql;
$tabAssoToken = [];     // pas de token

// ENVOYER LA REQUETE SQL (CREATE)
// NE PAS OUBLIER DE CHANGER LE NOM DE LA DATABASE
$dbname             = "multicrud";
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
        <td>$idcontenu</td>
        <td>$titre</td>
        <td>$description</td>
        <td>$photo</td>
        <td>$id_user</td>
        <td>$login</td>
    </tr>
codehtml;

}

?>
                </tbody>
            </table>

        </section>


        <section>
            <h2>AFFICHAGE DES CONTENUS CREES PAR toto</h2>
            <table>
                <thead>
                    <!-- AJOUTER LES TITRES DES COLONNES -->
                    <tr>
                        <td>idcontenu</td>
                        <td>titre</td>
                        <td>description</td>
                        <td>photo</td>
                        <td>id_user</td>
                        <td>login</td>
                    </tr>
                </thead>
                <tbody>
<?php
// ON VA CREER UNE LIGNE tr POUR CHAQUE LIGNE SQL DE LA TABLE contenu

// astuce: 
// on peut ajouter des colonnes supplémentaires et choisir le nom de ces colonnes
// SELECT *, contenu.id as idcontenu FROM contenu

$requeteSQL =
<<<codesql

SELECT *, contenu.id as idcontenu FROM contenu
INNER JOIN user
    ON contenu.id_user = user.id
WHERE 
    user.login = 'toto'

codesql;
$tabAssoToken = [];     // pas de token

// ENVOYER LA REQUETE SQL (CREATE)
// NE PAS OUBLIER DE CHANGER LE NOM DE LA DATABASE
$dbname             = "multicrud";
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
        <td>$idcontenu</td>
        <td>$titre</td>
        <td>$description</td>
        <td>$photo</td>
        <td>$id_user</td>
        <td>$login</td>
    </tr>
codehtml;

}

?>
                </tbody>
            </table>

        </section>

    </main>
    <footer>
        <p>tous droits réservés</p>
    </footer>
</body>
</html>