<?php

// RESPONSABLE SECURITE
// VALABLE POUR TOUS LE FORMULAIRES
class Controller
{
    // PROPRIETE STATIC
    public static $tabAssoJson = [];

    // METHODES
    static function traiterFormulaire ()
    {
        ob_start();

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

        // ON CAPTURE TOUT L'AFFICHAGE D'AVANT
        $outputDetourne = ob_get_clean();

        // ON VA FOURNIR DU CODE JSON
        Controller::$tabAssoJson["propriete1"] = "valeur1";
        Controller::$tabAssoJson["propriete2"] = "valeur2";
        Controller::$tabAssoJson["debug"]      = $outputDetourne;

        // ON CONVERTIR LE TABLEAU ASSOCIATIF EN CODE JSON
        echo json_encode(Controller::$tabAssoJson, JSON_PRETTY_PRINT);

    }

    static function redirigerPrecedent ()
    {
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
