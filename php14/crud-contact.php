<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN CLIENT / CRUD CONTACT</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <h1>ADMIN CLIENT / CRUD CONTACT</h1>
    </header>
    <main>
        <section>
            <h2>FORMULAIRE DE CREATE</h2>
            <form class="ajax create" action="api.php" method="POST" enctype="multipart/form-data">
                <!-- PARTIE A REMPLIR PAR L'UTILISATEUR -->
                <input type="email" name="email" required placeholder="votre email">
                <input type="text" name="nom" required placeholder="votre nom">
                <textarea name="message" required placeholder="votre message"></textarea>
                <button type="submit">ENVOYER VOTRE MESSAGE</button>
                <!-- PARTIE TECHNIQUE -->
                <input type="hidden" name="classeCible" value="Contact">
                <input type="hidden" name="methodeCible" value="create">
                <!-- POUR AFFICHER UN MESSAGE DE CONFIRMATION -->
                <div class="confirmation"></div>
            </form>
        </section>
        <section>
            <h2>FORMULAIRE DE READ</h2>
            <table>
                <thead>
                    <!-- A COMPLETER -->
                </thead>
                <tbody class="container-contacts">
<?php
require_once "php/model/Config.php";
Config::start();    // ACTIVE LE CHARGEMENT AUTOMATIQUE DES AUTRES CLASSES

// $tabContact EST UN TABLEAU ORDONNE DE TABLEAU ASSOCIATIF
$tabContact = Model::read("contact");

// VERSION SSR => PHP CREE LE CODE HTML DES BALISES tr
// BOUCLE SUR CE TABLEAU
foreach($tabContact as $uneLigne)
{
    // DE LA LIGNE, ON VA EXTRAIRE LES VALEURS DE CHAQUE COLONNE
    extract($uneLigne);
    // => AUTOMATIQUEMENT CREER UNE VARIABLE AVEC LE NOM DE LA COLONNE
    //      $id, $nom, $email, $dateReception
    echo 
<<<CODEHTML

    <tr>
        <td>$id</td>
        <td>$email</td>
        <td>$nom</td>
        <td><pre>$message</pre></td>
        <td>$dateReception</td>
        <td>
            <button class="update" data-id="$id">MODIFIER</button>
            <div class="update-$id">
                <input type="number" name="id" required placeholder="votre id" value="$id">
                <input type="email" name="email" required placeholder="votre email" value="$email">
                <input type="text" name="nom" required placeholder="votre nom" value="$nom">
                <textarea name="message" required placeholder="votre message">$message</textarea>
            </div>
        </td>
        <td>
            <button class="delete" data-id="$id">SUPPRIMER</button>
        </td>
    </tr>

CODEHTML;

}
?>
                </tbody>
            </table>
        </section>
        <section>
            <!-- CONSEIL GARDER LE UPDATE POUR LA FIN -->
            <h2>FORMULAIRE DE UPDATE</h2>
            <form class="ajax update" action="api.php" method="POST" enctype="multipart/form-data">
                <!-- PARTIE A REMPLIR PAR L'UTILISATEUR -->
                <div class="updateCopy">
                    <input type="number" name="id" required placeholder="votre id">
                    <input type="email" name="email" required placeholder="votre email">
                    <input type="text" name="nom" required placeholder="votre nom">
                    <textarea name="message" required placeholder="votre message"></textarea>
                </div>
                <button type="submit">MODIFIER VOTRE MESSAGE</button>
                <!-- PARTIE TECHNIQUE -->
                <input type="hidden" name="classeCible" value="Contact">
                <input type="hidden" name="methodeCible" value="update">
                <!-- POUR AFFICHER UN MESSAGE DE CONFIRMATION -->
                <div class="confirmation"></div>
            </form>
        </section>
        <section>
            <h2>FORMULAIRE DE DELETE</h2>
            <form class="ajax delete" action="api.php" method="POST" enctype="multipart/form-data">
                <!-- PARTIE A REMPLIR PAR L'UTILISATEUR -->
                <input type="number" name="id" required placeholder="votre id">
                <button type="submit">SUPPRIMER VOTRE MESSAGE</button>
                <!-- PARTIE TECHNIQUE -->
                <input type="hidden" name="classeCible" value="Contact">
                <input type="hidden" name="methodeCible" value="delete">
                <!-- POUR AFFICHER UN MESSAGE DE CONFIRMATION -->
                <div class="confirmation"></div>
            </form>
        </section>
    </main>

    <script src="assets/js/main.js"></script>

    <script>
// ON VEUT AJOUTER UN FONCTION DE CALLBACK
// QUAND ON CLIQUE SUR UN BOUTON delete
var baliseButtonDelete  = document.querySelector('form.delete button[type=submit]'); 
var baliseInputIdDelete = document.querySelector('form.delete input[name=id]'); 
var activerDelete = function(event) {
    // DEBUG
    console.log(event.target);
    var id = event.target.getAttribute('data-id');
    console.log(id);
    // COPIER LA VALEUR DE id
    baliseInputIdDelete.value = id;
    // ET IL SUFFIT D'ACTIVER LE FORMULAIRE
    baliseButtonDelete.click();
};
ajouterAction('button.delete', 'click', activerDelete);

// CODE JS POUR COPIER LES INFOS PRE REMPLIES DANS LE FORMULAIRE
var baliseCopyUpdate = document.querySelector(".updateCopy");
var activerCopyUpdate = function (event)
{
    var id = event.target.getAttribute('data-id');
    // ON VA SELECTIONNER LA BALISE QUI CONTIENT LE FORMULAIRE PRE-REMPLI
    var formulairePrerempli = document.querySelector(".update-" + id);
    // COPIER LE HTML PREREMPLI
    baliseCopyUpdate.innerHTML = formulairePrerempli.innerHTML;
}
ajouterAction('tbody button.update', 'click', activerCopyUpdate);


// ON VA RECONSTRUIRE LA LISTE EN JS
boiteAjax.majContact = function (objetJS, event)
{
    if ('tabContact' in objetJS)
    {
        var nouveauHTML = '';
        for(var c=0; c<objetJS.tabContact.length; c++)
        {
            var contact = objetJS.tabContact[c];
            nouveauHTML +=
            `
    <tr>
        <!-- READ -->
        <td>${contact.id}</td>
        <td>${contact.email}</td>
        <td>${contact.nom}</td>
        <td><pre>${contact.message}</pre></td>
        <td>${contact.dateReception}</td>
        <td>
            <button class="update" data-id="${contact.id}">MODIFIER</button>
            <!-- UPDATE PRE REMPLI -->
            <div class="update-${contact.id}">
                <input type="number" name="id" required placeholder="votre id" value="${contact.id}">
                <input type="email" name="email" required placeholder="votre email" value="${contact.email}">
                <input type="text" name="nom" required placeholder="votre nom" value="${contact.nom}">
                <textarea name="message" required placeholder="votre message">${contact.message}</textarea>
            </div>
        </td>
        <td>
            <button class="delete" data-id="${contact.id}">SUPPRIMER</button>
        </td>
    </tr>
            `;

        }
        // ON MET A JOUR LA LISTE AVEC LE NOUVEAU CODE HTML
        var balideTbody = document.querySelector("tbody.container-contacts");
        balideTbody.innerHTML = nouveauHTML;

        // ON DOIT RAJOUTER DE NOUVEAU LES EVENT LISTENER SUR LES NOUVEAUX BOUTONS
        ajouterAction('tbody button.delete', 'click', activerDelete);
        ajouterAction('tbody button.update', 'click', activerCopyUpdate);

    }
}
    </script>
</body>
</html>