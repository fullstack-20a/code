<?php

// POUR TRAITER LES FORMULAIRES
class ApiArticle 
{
    // METHODES
    static function create ()
    {
        // ICI ON VA TRAITER LE FORMULAIRE DE CREATE
        // DEBUG
        echo "<h4>ON A ACTIVE LE CODE DE ApiArticle::create</h4>";

        // RECUPERER LES INFOS FOURNIES PAR L'UTILISATEUR
        // VALIDER QUE TOUTES LES INFOS SONT CORRECTE
        // ET SI TOUT EST OK
        //      => MEMORISER LES INFOS DANS UNE LIGNE SQL DE LA TABLE article

        // SECURITE: ON MET EN QUARANTAINE LES DONNEES QUI VIENNENT DE L'EXTERIEUR
        $tabAssoToken =
        [
            // "cle"   => "valeur",
            // CLE: COLONNES SQL (DEJA CREEES)         // VALEUR: name HTML
            "titre"             => Controller::filtrer("titre"),
            "contenu"           => Controller::filtrer("contenu"),
            "photo"             => Controller::filtrer("photo"),
            "categorie"         => Controller::filtrer("categorie"),
            // COMPLETER LES COLONNES MANQUANTES
            "datePublication"   => date("Y-m-d H:i:s"), // FORMAT DATETIME 2020-06-15 11:07:23
        ];

        // SECURITE: VERIFIER QUE TOUTES LES INFOS SONT CORRECTES...
        if (Controller::isOK())
        {
            // ON VA FAIRE APPEL AU MODEL POUR AJOUTER UNE LIGNE SQL
            Model::insert("article", $tabAssoToken);
        }
    }

    static function delete ()
    {
        // ICI ON VA TRAITER LE FORMULAIRE DE DELETE
        echo "<h4>ON A ACTIVE LE CODE DE ApiArticle::delete</h4>";

        $tabAssoToken =
        [
            "id"             => Controller::filtrer("id"),
        ];

        // SECURITE: VERIFIER QUE TOUTES LES INFOS SONT CORRECTES...
        if (Controller::isOK())
        {
            Model::delete("article", $tabAssoToken);
        }
    }

    static function update ()
    {
        // ICI ON VA TRAITER LE FORMULAIRE DE UPDATE
        // DEBUG
        echo "<h4>ON A ACTIVE LE CODE DE ApiArticle::update</h4>";

        // RECUPERER LES INFOS FOURNIES PAR L'UTILISATEUR
        // VALIDER QUE TOUTES LES INFOS SONT CORRECTE
        // ET SI TOUT EST OK
        //      => MEMORISER LES INFOS DANS UNE LIGNE SQL DE LA TABLE article

        // SECURITE: ON MET EN QUARANTAINE LES DONNEES QUI VIENNENT DE L'EXTERIEUR
        $tabAssoToken =
        [
            // "cle"   => "valeur",
            // CLE: COLONNES SQL (DEJA CREEES)         // VALEUR: name HTML
            "titre"             => Controller::filtrer("titre"),
            "contenu"           => Controller::filtrer("contenu"),
            "photo"             => Controller::filtrer("photo"),
            "categorie"         => Controller::filtrer("categorie"),
            // COMPLETER LES COLONNES MANQUANTES
            "datePublication"   => date("Y-m-d H:i:s"), // FORMAT DATETIME 2020-06-15 11:07:23
        ];

        // ON RECUPERE id A PART
        $id = Controller::filtrer("id");

        // SECURITE: VERIFIER QUE TOUTES LES INFOS SONT CORRECTES...
        if (Controller::isOK())
        {
            // ON VA FAIRE APPEL AU MODEL POUR AJOUTER UNE LIGNE SQL
            Model::update("article", $id, $tabAssoToken);
        }
    }

    static function read ()
    {
        // ICI ON VA TRAITER LE FORMULAIRE DE READ
    }
}
