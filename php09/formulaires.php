<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMULAIRES</title>
</head>
<body>
    <header>
        <h1>FORMULAIRES</h1>
    </header>
    <main>
        <section>
            <h2>FORMULAIRE D'INSCRIPTION A LA NEWSLETTER</h2>
            <!-- la classe .ajax sert au code js pour bloquer le formulaire classique -->
            <form class="ajax" action="api.php" method="POST">
                <!-- NORMALEMENT ON A UNE TABLE SQL newsletter AVEC COMME COLONNES id ET nom ET email -->
                <!-- DANS LE CRUD = CREATE SUR LA TABLE newsletter -->
                <input type="text" name="nom" required placeholder="votre nom">
                <input type="email" name="email" required placeholder="votre email">
                <button type="submit">inscription</button>
                <!-- ASTUCE: UN CHAMP TECHNIQUE POUR RAJOUTER DES INFOS UTILES POUR PHP -->
                <!-- <input type="hidden" name="codebarre" value="newsletter"> -->
                <input type="hidden" name="classeCible" value="Newsletter">
                <input type="hidden" name="methodeCible" value="create">
                <pre class="confirmation"></pre>
            </form>
        </section>

        <section>
            <h2>FORMULAIRE DE CONTACT</h2>
            <!-- la classe .ajax sert au code js pour bloquer le formulaire classique -->
            <form class="ajax" action="api.php" method="POST">
                <!-- NORMALEMENT ON A UNE TABLE SQL contact AVEC COMME COLONNES id ET nom ET email ET message -->
                <!-- DANS LE CRUD = CREATE SUR LA TABLE contact -->
                <input type="text" name="nom" required placeholder="votre nom">
                <input type="email" name="email" required placeholder="votre email">
                <textarea name="message" required placeholder="votre message"></textarea>
                <button type="submit">envoyer le message</button>
                <!-- ASTUCE: UN CHAMP TECHNIQUE POUR RAJOUTER DES INFOS UTILES POUR PHP -->
                <!-- <input type="hidden" name="codebarre" value="contact"> -->
                <input type="hidden" name="classeCible" value="Contact">
                <input type="hidden" name="methodeCible" value="create">
                <pre class="confirmation"></pre>
            </form>
        </section>

    </main>
    <footer>
        <p>tous droits réservés</p>
    </footer>

    <script>
// ON VA INTERCEPTER L'ENVOI DES FORMULAIRES QUI ONT LA CLASSE .ajax 
var listeForm = document.querySelectorAll('form.ajax');
for(var f=0; f < listeForm.length; f++)
{
    var form = listeForm[f];
    form.addEventListener('submit', function(event){
        // ON BLOQUE LE COMPORTEMENT CLASSIQUE
        event.preventDefault();

        // MAINTENANT IL FAUT QUAND MEME ENVOYER LES INFOS DU FORMULAIRE VERS api.php
        // https://developer.mozilla.org/fr/docs/Web/API/Fetch_API/Using_Fetch
        // IL FUT RECUPERER LES INFOS ENTREES DANS LE FORMULAIRE 
        // ET LES AJOUTER DANS LA REQUETE AJAX AVEC FETCH
        // event.target EST LE FORMULAIRE SUR LEQUEL LE VISITEUR A CLIQUE
        // FormData ASPIRE LES INFOS DU FORMULAIRE EN COURS
        // https://developer.mozilla.org/fr/docs/Web/Guide/Using_FormData_Objects
        var formData = new FormData(event.target);

        // ON ENVOIE UNE REQUETE SANS RECHARGER LA PAGE
        fetch('api.php', {
            method: 'POST',     // PRATIQUE CAR CA MARCHERA POUR L'UPLOAD DE FICHIER
            body:   formData
        })
        .then(function(reponseServeur) {    // PROMESSE => ON SAIT QU'ON VA RECEVOIR UNE REPONSE MAIS ON NE SAIT PAS QUAND... 
            // DEBUG
            console.log(reponseServeur);
            // JE VEUX EXTRAIRE LE CONTENU RETOURNE PAR LE SERVEUR
            reponseServeur
                // .text()  // POUR LE TEXTE BRUT
                .json()     // POUR LE FORMAT JSON
                .then(function(objetJS) {   // ON CREE UN PARAMETRE QUI SERA REMPLI PAR JS AVEC COMME VALEUR UN OBJET JS
                    // COOL ON A MAINTENANT UN OBJET JS QU'ON PEUT UTILISER
                    console.log(objetJS);

                    // ON PEUT AFFICHER LE MESSAGE DE CONFIRMATION
                    var baliseConfirmation = event.target.querySelector(".confirmation");
                    baliseConfirmation.innerHTML = objetJS.confirmation;

                    // debug serveur
                    if ('debug' in objetJS) console.log(objetJS.debug);
                });
        });
    });
}        
    </script>
</body>
</html>