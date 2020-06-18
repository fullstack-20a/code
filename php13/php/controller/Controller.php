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
        Controller::$tabAssoJson["request"]    = $_REQUEST; // POUR AIDER AU DEBUG
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

    // CODE A PART POUR GERER LES UPLOADS DANS UN FORMULAIRE
    static function filtrerUpload ($name)
    {
        // ON DOIT GERER LES UPLOAD A PART
        // SI IL Y A UN FICHIER EN QUARANTAINE
        // LES INFOS SONT DANS UN TABLEAU ASSOCIATIF $_FILES
        // DEBUG
        print_r($_FILES);
        $destination = "";
        // https://www.php.net/manual/fr/function.isset.php
        if (isset($_FILES[$name]))
        {
            // OUI ON A UN FICHIER EN QUARANTAINE EN ATTENTE
            $tabAssoFichier = $_FILES[$name];
            $error      = $tabAssoFichier["error"];     // 0 SI TOUT EST BIEN TRANSFERE
            $size       = $tabAssoFichier["size"];      // TAILLE DU FICHIER EN OCTETS
            $name       = $tabAssoFichier["name"];      // NOM DU FICHIER ORIGINAL
            $tmp_name   = $tabAssoFichier["tmp_name"];  // LE FICHIER EN QUARANTAINE
            // ICI IL FAUT DECIDER SI ON RECUPERE CE FICHIER
            // SI ON NE LE RECUPERE PAS APACHE VA LE DETRUIRE RAPIDEMENT... 
            // SI ON EST OPEN BAR ON VA RECUPERER LE FICHIER EN QUARANTAINE 
            // ET ON VA LE DEPLACER DANS assets/upload 
            // (NE PAS OUBLIER DE CREER CE DOSSIER AVANT...)
            // https://www.php.net/manual/fr/function.move-uploaded-file.php
            $destination = "assets/upload/$name";
            move_uploaded_file($tmp_name, $destination);

        }
        // ON RENVOIE LE CHEMIN DU FICHIER SUR LE SERVEUR
        return $destination;

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
