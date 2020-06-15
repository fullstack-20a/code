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



// RESPONSABLE SECURITE
// VALABLE POUR TOUS LE FORMULAIRES
class Controller
{
    // METHODES
    static function traiterFormulaire ()
    {
        // ICI ON VA RECEPTIONNER LA REQUETE DU NAVIGATEUR
        // ET ON VA ACTIVER LA BONNE CLASSE ET METHODE D'API

        // RECUPERER LES INFOS POUR LA CLASSE ET LA METHODE CIBLE
        $classeCible  = Controller::filtrer("classeCible");     // $_REQUEST["classeCible"];
        $methodeCible = Controller::filtrer("methodeCible");    // $_REQUEST["methodeCible"];

        if (($classeCible != "") && ($methodeCible != ""))
        {
            // SECURITE: RESTREINDRE L'ACCES A NOTRE CODE...
            // ON PREFIXE AVEC Api POUR NE LAISSER L'ACCESS 
            // SEULEMENT SUR LES CLASSES QUI COMMENCENT PAR Api
            $codeCible = "Api$classeCible::$methodeCible";
            // AVEC PHP, ON PEUT ACTIVER DU CODE QUI EST DANS UN TEXTE
            // https://www.php.net/manual/fr/function.is-callable.php 
            if (is_callable($codeCible))
            {
                // ON APPELLE LA FONCTION DONT LE CODE EST CODEE DANS LE TEXTE
                $codeCible();
            }
        }

        // SI ON VEUT ON PEUT FAIRE UNE REDICECTION VERS LA PAGE D'AVANT
        // https://www.php.net/manual/fr/reserved.variables.server.php
        $urlPrecedente = $_SERVER["HTTP_REFERER"];
        // REDIRECTION
        // https://www.php.net/manual/fr/function.header.php
        header("location: $urlPrecedente");
    }

    // CETTE METHODE VA PROTEGER PHP
    // EN FILTRANT LES INFOS RECUES DES FORMULAIRES
    static function filtrer ($name)
    {
        // $_REQUEST VA RECEVOIR LES INFOS EN GET ET EN POST: PRATIQUE COTE HTML ON PEUT FAIRE LES 2

        $resultat = $_REQUEST[$name] ?? "";     
        // PREMIERE SECURITE: ON MET UNE VALEUR PAR DEFAUT SI L'INFO N'EST PAS PRESENTE
        // ON NE VEUT PAS RECEVOIR DU CODE HTML OU AUTRE
        // https://www.php.net/manual/fr/function.strip-tags.php
        $resultat = strip_tags($resultat);
        // https://www.php.net/manual/fr/function.trim.php
        $resultat = trim($resultat);
        // etc...

        return $resultat;
    }

    // SECURITE: VALIDER LES INFOS DU FORMULAIRE
    static function isOK ()
    {
        // TODO
        $resultat = true;
        // ... A COMPLETER... 
        return $resultat;
    }
}

// CHARGER LE CLASSES DEFINIES DANS DES FICHIERS SEPARES
require_once "php/model/Config.php";
require_once "php/model/Model.php";

// DEFINITION D'UNE API
// Application Programming Interface
// => MOYEN DEPUIS L'EXTERIEUR D'ACTIVER DU CODE PHP
// => COMME ON FAIT DE LA Programmation Orientée Objet (P.O.O.) EN PHP
//      TOUT NOTRE CODE PHP SERA RANGE DANS DES CLASSES ET DES METHODES
//      ACTIVER DU CODE POO REVIENT A APPELER UNE METHODE DANS UNE CLASSE

// LA METHODE QU'ON ACTIVE AU DEPART
Controller::traiterFormulaire();


// LA FIN DU FICHIER SERT DE BALISE FERMANTE POUR PHP
// COOL ;-p
