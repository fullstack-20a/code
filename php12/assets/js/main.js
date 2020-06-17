console.log('JS EN COURS DE CHARGEMENT...');

// AJOUTER CODE JS POUR PASSER LES FORMULAIRES EN AJAX

var envoyerRequeteAjax = function (event)
{
    event.preventDefault();
    var boiteFormulaire = new FormData(event.target);  // ON ASPIRE LES ENTREES DU VISITEUR
    var paramFetch = {
        method : 'POST',    // PRATIQUE POUR POUVOIR FAIRE UPLOAD
        body: boiteFormulaire 
    };
    var requeteAjax = fetch('api.php', paramFetch); // ENVOI DU FORMULAIRE EN AJAX
    requeteAjax
    .then(function(reponseServeur){
        reponseServeur
        .json()     // ON CONVERTIT LE CODE JSON EN OBJET JS
        .then(function(objetJS) {
            if ('debug' in objetJS)
            {
                console.log(objetJS.debug);
            }

            if ( 'confirmation' in objetJS)
            {
                // ON AFFICHE UN MESSAGE DE CONFIRMATION
                var baliseConfirmation = event.target.querySelector('.confirmation');
                baliseConfirmation.innerHTML = objetJS.confirmation;
            }

            if ( 'cleAPI' in objetJS)
            {
                // ON VA MEMORISER LA CLE API
                // POUR POUVOIR S'EN RESSERVIR DANS LES AUTRES PAGES
                // ON VA UTILISER localStorage OU sessionStorage
                sessionStorage.setItem('cleAPI', objetJS.cleAPI);
            }

            // PARCOURIR LES PROPRIETES D'UN OBJET
            for(callback in boiteAjax)
            {
                // ON APPELLE DYNAMIQUEMENT LA FONCTION DE CALLBACK
                boiteAjax[callback](objetJS, event);
            }
            
        });
    });

}
var boiteAjax = {};

function ajouterAction (selecteurCSS, evenement, callback)
{
    var listeBalise = document.querySelectorAll(selecteurCSS);
    for(var b=0; b<listeBalise.length; b++)
    {
        var balise = listeBalise[b];
        balise.addEventListener(evenement, callback);
    }
}

ajouterAction('form.ajax', 'submit', envoyerRequeteAjax);

