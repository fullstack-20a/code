<?php

class ApiArticle 
{
    // METHODES
    static function create ()
    {
        // ICI ON VA TRAITER LE FORMULAIRE DE CREATE
        // DEBUG
        echo "<h4>ON A ACTIVE LE CODE DE ApiArticle::create</h4>";
    }

    static function delete ()
    {
        // ICI ON VA TRAITER LE FORMULAIRE DE DELETE
    }

    static function update ()
    {
        // ICI ON VA TRAITER LE FORMULAIRE DE UPDATE
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
    }

    // CETTE METHODE VA PROTEGER PHP
    // EN FILTRANT LES INFOS RECUES DES FORMULAIRES
    static function filtrer ($name)
    {
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
}

// LA METHODE QU'ON ACTIVE AU DEPART
Controller::traiterFormulaire();
