<?php

// ATTENTION: SANS LE CHARGEMENT AUTOMATIQUE DE CLASSE
// NE PAS OUBLIER DE RAJOUTER LA LIGNE require_once DANS api.php
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

            // DEMANDER AU NAVIGATEUR DE RECHARGER LA PAGE
            // Controller::$tabAssoJson["redirection"] = 'crud-contact.php';

            // ENVOYER UN MAIL
            // https://www.php.net/manual/fr/function.mail
            // @mail("destinataire@mail.me", "sujet", "message");

            // ON PEUT RENVOYER LA NOUVELLE LISTE DES ARTICLES
            // DANS LA REPONSE JSON
            // ON UTILISE LA METHODE read QUI RENVOIE LA LISTE DES LIGNES
            // SOUS LA FORME D'UN TABLEAU DE TABLEAUX...
            Controller::$tabAssoJson["tabContact"] = Model::read("contact");
        }
    }

    static function delete ()
    {
        $tabAssoToken =
        [
            "id"             => Controller::filtrer("id"),
        ];

        // SECURITE: VERIFIER QUE TOUTES LES INFOS SONT CORRECTES...
        if (Controller::isOK())
        {
            Model::delete("contact", $tabAssoToken);
            // ApiArticle::read();

            Controller::$tabAssoJson["confirmation"] = "LIGNE SUPPRIMEE";

            // DEMANDER AU NAVIGATEUR DE RECHARGER LA PAGE
            // Controller::$tabAssoJson["redirection"] = 'crud-contact.php';
            Controller::$tabAssoJson["tabContact"] = Model::read("contact");

        }

    }

    // GARDER UPDATE A LA FIN
    static function update ()
    {
        // NOTE: SQL N'OBLIGE PAS A MODIFIER TOUTES LES COLONNES...
        $tabAssoToken =
        [
            "email"             => Controller::filtrerEmail("email"),
            "nom"               => Controller::filtrerTexte("nom"),
            "message"           => Controller::filtrerTexte("message"),
        ];

        // ON RECUPERE id A PART
        $id = Controller::filtrer("id");

        // SECURITE: VERIFIER QUE TOUTES LES INFOS SONT CORRECTES...
        if (Controller::isOK())
        {
            // ON VA FAIRE APPEL AU MODEL POUR AJOUTER UNE LIGNE SQL
            Model::update("contact", $id, $tabAssoToken);

            Controller::$tabAssoJson["confirmation"] = "LIGNE MODIFIEE";

            // DEMANDER AU NAVIGATEUR DE RECHARGER LA PAGE
            // Controller::$tabAssoJson["redirection"] = 'crud-contact.php';
            Controller::$tabAssoJson["tabContact"] = Model::read("contact");
        }

    }

    static function read ()
    {
        Controller::$tabAssoJson["tabContact"] = Model::read("contact");
    }

}