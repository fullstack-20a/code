<?php



class ApiContact
{
    // METHODES static
    static function create ()
    {
        $tabAssoToken = [ 
            // COLONNE SQL              INPUT NAME
            "nom"       => Controller::filtrer("nom"), 
            "email"     => Controller::filtrer("email"),     // VERIFICATION SUR LE FORMAT
            "message"   => Controller::filtrer("message"),     // VERIFICATION SUR LE FORMAT
        ];

        // TODO: ON DOIT VALIDER QUE LES INFOS SONT CORRECTES
        if (Controller::isOK())
        {
            // INSERE UNE NOUVELLE LIGNE DANS LA TABLE SQL
            Model::insert("contact", $tabAssoToken);

            // ON VA POUVOIR AJOUTER UN MESSAGE DE CONFIRMATION 
            Ajax::$tabAssoJson["confirmation"] = "MERCI DE VOTRE MESSAGE";
        }

    }

}
