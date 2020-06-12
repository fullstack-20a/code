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
        // echo "<h5>ON ACTIVE LE CODE DE ApiNewsletter::create</h5>";
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
            Model::insert("newsletter", $tabAssoToken);

            // ON VA POUVOIR AJOUTER UN MESSAGE DE CONFIRMATION 
            Ajax::$tabAssoJson["confirmation"] = "MERCI DE VOTRE INSCRIPTION A LA NEWSLETTER";
        }
    }

}
