<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD article</title>
    <style>
html, body {
    width:100%;
    padding:0;
    margin:0;
    font-size:14px;
}     
* {
    box-sizing: border-box;
    width:100%;
}
form {
    max-width:640px;
    padding:1rem;
}
input, textarea, button {
    padding:0.5rem;
    margin:0.5rem;
}

table td {
    border:1px solid #cccccc;
}

.source {
    display:none;
}

.lightbox {
    display: none;
}
.lightbox.active {
    display: block;
    position:fixed;
    bottom:0;
    left:0;
    width:100%;
    height:100%;
    background-color: rgba(0,0,0, 0.8);
}

    </style>
</head>
<body>
    <header>
        <h1>CRUD article</h1>
    </header>
    <main>
        <section>
            <h2>CREATE</h2>
            <form class="create" action="api.php" method="POST">
                <!-- PARTIE A REMPLIR PAR L'UTILISATEUR -->
                <input type="text" name="titre" required placeholder="titre">
                <textarea name="contenu" required placeholder="contenu"></textarea>
                <input type="text" name="photo" required placeholder="photo">
                <input type="text" name="categorie" required placeholder="categorie">
                <button type="submit">PUBLIER MON ARTICLE</button>
                <!-- PARTIE TECHNIQUE -->
                <input type="hidden" name="classeCible" value="Article">
                <input type="hidden" name="methodeCible" value="create">
                <!-- POUR AFFICHER UN MESSAGE DE CONFIRMATION -->
                <div class="confirmation"></div>
            </form>
        </section>

        <section class="source">
            <h2>DELETE</h2>
            <form class="delete" action="api.php" method="POST">
                <!-- PARTIE A REMPLIR PAR L'UTILISATEUR -->
                <input type="number" name="id" required placeholder="id">
                <button type="submit">SUPPRIMER MON ARTICLE</button>
                <!-- PARTIE TECHNIQUE -->
                <input type="hidden" name="classeCible" value="Article">
                <input type="hidden" name="methodeCible" value="delete">
                <!-- POUR AFFICHER UN MESSAGE DE CONFIRMATION -->
                <div class="confirmation"></div>
            </form>
        </section>

        <section class="lightbox">
            <button class="close">fermer la lightbox</button>
            <h2>UPDATE</h2>
            <form class="update" action="api.php" method="POST">
                <!-- PARTIE A REMPLIR PAR L'UTILISATEUR -->
                <div class="update-copy">
                    <input type="hidden" name="id" required placeholder="id">
                    <input type="text" name="titre" required placeholder="titre">
                    <textarea name="contenu" required placeholder="contenu"></textarea>
                    <input type="text" name="photo" required placeholder="photo">
                    <input type="text" name="categorie" required placeholder="categorie">
                </div>
                <button type="submit">MODIFIER MON ARTICLE</button>
                <!-- PARTIE TECHNIQUE -->
                <input type="hidden" name="classeCible" value="Article">
                <input type="hidden" name="methodeCible" value="update">
                <!-- POUR AFFICHER UN MESSAGE DE CONFIRMATION -->
                <div class="confirmation"></div>
            </form>
        </section>

        <section>
            <h2>READ</h2>
            <table>
                <thead>
                    <!-- TITRE DES COLONNES-->
                    <tr>
                        <td>id</td>
                        <td>titre</td>
                        <td>contenu</td>
                        <td>photo</td>
                        <td>categorie</td>
                        <td>datePublication</td>
                        <td>MODIFIER</td>
                        <td>SUPPRIMER</td>
                    </tr>
                </thead>
                <tbody>
                    <!-- LIGNE => TABLE ROW => TR -->
<?php
// CHARGER LE CLASSES DEFINIES DANS DES FICHIERS SEPARES
require_once "php/model/Config.php";
require_once "php/model/Model.php";
// ON VA RECUPERER LES INFOS DE LA TABLE SQL article
// SOUS LA FORME D'UN TABLEAU ORDONNE DE TABLEAUX ASSOCIATIFS
// ET ENSUITE, ON FAIT DES BOUCLES POUR CREER LE HTML
$tabLigne = Model::read("article");
// DEBUG
//print_r($tabLigne);
$codeHTML = "";
foreach($tabLigne as $ligne)
{
    $codeHTML .= "<tr>";

    foreach($ligne as $colonne)
    {
        $codeHTML .= "<td>$colonne</td>";
    }

    $id         = $ligne["id"]; // ON RECUPERE LA COLONNE id DANS LE TABLEAU ASSOCIATIF
    $titre      = $ligne["titre"]; // ON RECUPERE LA COLONNE id DANS LE TABLEAU ASSOCIATIF
    $contenu    = $ligne["contenu"]; // ON RECUPERE LA COLONNE id DANS LE TABLEAU ASSOCIATIF
    $photo      = $ligne["photo"]; // ON RECUPERE LA COLONNE id DANS LE TABLEAU ASSOCIATIF
    $categorie  = $ligne["categorie"]; // ON RECUPERE LA COLONNE id DANS LE TABLEAU ASSOCIATIF

    // ON VA AJOUTER LE BOUTON MODIFIER ET SUPPRIMER    
    $codeHTML .=
<<<CODEHTML

<td>
    <button data-id="$id" class="update">modifier</button>
    <div class="source update-$id">
        <!-- PARTIE A REMPLIR PAR L'UTILISATEUR -->
        <input type="hidden" name="id" required placeholder="id" value="$id">
        <input type="text" name="titre" required placeholder="titre" value="$titre">
        <textarea name="contenu" required placeholder="contenu">$contenu</textarea>
        <input type="text" name="photo" required placeholder="photo" value="$photo">
        <input type="text" name="categorie" required placeholder="categorie" value="$categorie">
    </div>
</td>

<td><button class="delete" data-id="$id">supprimer</button></td>
<td>
    <form class="delete" action="api.php" method="POST">
    <!-- PARTIE A REMPLIR PAR L'UTILISATEUR -->
    <input type="number" name="id" required placeholder="id" value="$id">
    <button type="submit">SUPPRIMER MON ARTICLE</button>
    <!-- PARTIE TECHNIQUE -->
    <input type="hidden" name="classeCible" value="Article">
    <input type="hidden" name="methodeCible" value="delete">
    <!-- POUR AFFICHER UN MESSAGE DE CONFIRMATION -->
    <div class="confirmation"></div>
    </form>
</td>
<td>
    <a href="api.php?id=$id&classeCible=Article&methodeCible=delete">supprimer</a>
</td>
CODEHTML;

    $codeHTML .= "</tr>";

}
echo $codeHTML;
?>
                </tbody>
            </table>
        </section>
        <script>
// ON VEUT AJOUTER UN FONCTION DE CALLBACK
// QUAND ON CLIQUE SUR UN BOUTON delete
var baliseButtonDelete  = document.querySelector('form.delete button[type=submit]'); 
var baliseInputIdDelete = document.querySelector('form.delete input[name=id]'); 
var listeBoutonDelete   = document.querySelectorAll('button.delete');
for(var b=0; b<listeBoutonDelete.length; b++)
{
    var bouton = listeBoutonDelete[b];
    bouton.addEventListener('click', function(event) {
        // DEBUG
        console.log(event.target);
        var id = event.target.getAttribute('data-id');
        console.log(id);
        // COPIER LA VALEUR DE id
        baliseInputIdDelete.value = id;
        // ET IL SUFFIT D'ACTIVER LE FORMULAIRE
        baliseButtonDelete.click();
    })
}

// QUAND ON CLIQUE SUR LE BOUTON modifier
// JE VEUX COPIER LE FORMULAIRE PRE-REMPLI DANS LE FORMULAIRE D'UPDATE
var baliseSectionUpdate = document.querySelector('section.lightbox');
var baliseUpdateCopy = document.querySelector('form.update div.update-copy');
var listeBoutonModifier = document.querySelectorAll('button.update');
for(var b=0; b<listeBoutonModifier.length; b++)
{
    var bouton = listeBoutonModifier[b];
    bouton.addEventListener('click', function(event) {
        var id = event.target.getAttribute('data-id');
        var selecteurForm = '.update-' + id;
        var divSource = document.querySelector(selecteurForm);
        // DEBUG
        console.log(divSource);
        // ON COPIE LE FORMULAIRE PREREMPLI
        baliseUpdateCopy.innerHTML = divSource.innerHTML;

        // ON MONTRE LA LIGHTBOX
        baliseSectionUpdate.classList.add('active');
    })
}

// ON AJOUTE LE BOUTON POUR FERMER LA LIGHTBOX
var boutonClose = document.querySelector('section.lightbox .close');
boutonClose.addEventListener('click', function() {
    // ON CACHE LA LIGHTBOX EN ENLEVANT LA CLASSE active
    baliseSectionUpdate.classList.remove('active');
})

        </script>


    </main>
    <footer>
        <p>tous droits réservés</p>
    </footer>
</body>
</html>