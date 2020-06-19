<?php

// ATTENTION: SANS LE CHARGEMENT AUTOMATIQUE DE CLASSE
//  NE PAS OUBLIER DE RAJOUTER LA LIGNE require_once DANS api.php
class ApiNewsletter
{
    // METHODES
    static function create ()
    {
        echo "(ApiNewsletter::create)";
        $tabAssoToken =
        [
            "email"             => Controller::filtrerEmail("email"),   // $name = "titre"
            "nom"               => Controller::filtrerTexte("nom"),
            // COMPLETER LES COLONNES MANQUANTES
            "dateInscription"   => date("Y-m-d H:i:s"), // FORMAT DATETIME 2020-06-15 11:07:23
        ];

        // SECURITE: VERIFIER QUE TOUTES LES INFOS SONT CORRECTES...
        if (Controller::isOK())
        {
            // ON VA FAIRE APPEL AU MODEL POUR AJOUTER UNE LIGNE SQL
            Model::insert("newsletter", $tabAssoToken);

            Controller::$tabAssoJson["confirmation"] = "MERCI DE VOTRE INSCRIPTION";

            // ON PEUT RENVOYER LA NOUVELLE LISTE DES ARTICLES
            // DANS LA REPONSE JSON
            // ON UTILISE LA METHODE read QUI RENVOIE LA LISTE DES LIGNES
            // SOUS LA FORME D'UN TABLEAU DE TABLEAUX...
            // ApiNewsletter::read();
        }
    }
}