<?php

// POUR TRAITER LES FORMULAIRES
class ApiArticle 
{
    // METHODES
    static function create ()
    {
        // ON VA AJOUTER UNE PROTECTION AVEC UNE CLE API
        // LE FORMULAIRE DEVRA ENVOYER UNE INFORMATION SUPPLEMENTAIRE QUI SERA LA CLE API
        $cleAPI = Controller::filtrer("cleAPI");
        if ($cleAPI != Config::$cleAdminAPI)
        {
            Controller::$tabAssoJson["confirmation"] = "cleAPI MANQUANTE";
            return; // ON ARRETE L'EXECUTION DU CODE DE CETTE METHODE
        }

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
            "titre"             => Controller::filtrer("titre"),   // $name = "titre"
            "contenu"           => Controller::filtrer("contenu"),
            "photo"             => Controller::filtrerUpload("photo"), // SPECIAL POUR GERER L'UPLOAD DE FICHIER
            "categorie"         => Controller::filtrer("categorie"),
            // COMPLETER LES COLONNES MANQUANTES
            "datePublication"   => date("Y-m-d H:i:s"), // FORMAT DATETIME 2020-06-15 11:07:23
        ];

        // SECURITE: VERIFIER QUE TOUTES LES INFOS SONT CORRECTES...
        if (Controller::isOK())
        {
            // ON VA FAIRE APPEL AU MODEL POUR AJOUTER UNE LIGNE SQL
            Model::insert("article", $tabAssoToken);

            // ON PEUT RENVOYER LA NOUVELLE LISTE DES ARTICLES
            // DANS LA REPONSE JSON
            // ON UTILISE LA METHODE read QUI RENVOIE LA LISTE DES LIGNES
            // SOUS LA FORME D'UN TABLEAU DE TABLEAUX...
            ApiArticle::read();
        }
    }

    static function delete ()
    {
        $cleAPI = Controller::filtrer("cleAPI");
        if ($cleAPI != Config::$cleAdminAPI)
        {
            Controller::$tabAssoJson["confirmation"] = "cleAPI MANQUANTE";
            return; // ON ARRETE L'EXECUTION DU CODE DE CETTE METHODE
        }

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
            ApiArticle::read();
        }
    }

    static function update ()
    {
        $cleAPI = Controller::filtrer("cleAPI");
        if ($cleAPI != Config::$cleAdminAPI)
        {
            Controller::$tabAssoJson["confirmation"] = "cleAPI MANQUANTE";
            return; // ON ARRETE L'EXECUTION DU CODE DE CETTE METHODE
        }

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
            ApiArticle::read();
        }
    }

    static function read ()
    {
        $cleAPI = Controller::filtrer("cleAPI");
        if ($cleAPI != Config::$cleAdminAPI)
        {
            Controller::$tabAssoJson["confirmation"] = "cleAPI MANQUANTE";
            return; // ON ARRETE L'EXECUTION DU CODE DE CETTE METHODE
        }

        // ICI ON VA TRAITER LE FORMULAIRE DE READ
        Controller::$tabAssoJson["listeArticle"] = Model::read("article");
    }
}
