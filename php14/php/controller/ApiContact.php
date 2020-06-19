<?php

// ATTENTION: SANS LE CHARGEMENT AUTOMATIQUE DE CLASSE
//  NE PAS OUBLIER DE RAJOUTER LA LIGNE require_once DANS api.php
class ApiContact
{
    // METHODES
    static function create ()
    {
        echo "(ApiContact::create)";
        $tabAssoToken =
        [
            "email"             => Controller::filtrerEmail("email"),   // $name = "titre"
            "nom"               => Controller::filtrerTexte("nom"),
            "message"           => Controller::filtrerTexte("message"),
            // COMPLETER LES COLONNES MANQUANTES
            "dateReception"   => date("Y-m-d H:i:s"), // FORMAT DATETIME 2020-06-15 11:07:23
        ];

        // SECURITE: VERIFIER QUE TOUTES LES INFOS SONT CORRECTES...
        if (Controller::isOK())
        {
            // ON VA FAIRE APPEL AU MODEL POUR AJOUTER UNE LIGNE SQL
            Model::insert("contact", $tabAssoToken);

            Controller::$tabAssoJson["confirmation"] = "MERCI DE VOTRE MESSAGE";

            // ENVOYER UN MAIL
            // https://www.php.net/manual/fr/function.mail
            // @mail("destinataire@mail.me", "sujet", "message");

            // ON PEUT RENVOYER LA NOUVELLE LISTE DES ARTICLES
            // DANS LA REPONSE JSON
            // ON UTILISE LA METHODE read QUI RENVOIE LA LISTE DES LIGNES
            // SOUS LA FORME D'UN TABLEAU DE TABLEAUX...
            // ApiContact::read();
        }
    }
}