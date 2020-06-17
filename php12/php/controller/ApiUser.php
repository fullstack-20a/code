<?php

class ApiUser
{
    // METHODES

    // VARIANTE SUR LE READ
    static function login ()
    {
        // DEBUG
        echo "ApiUser::login";
        // ON VA RECUPERER LES INFOS DE FORMULAIRES
        // email ET password EN CLAIR
        // ON VA UTILISER email POUR CHERCHER LA LIGNE CORRESPONDANTE DANS LA TABLE SQL user
        // ET ENSUITE ON POURRA VERIFIER SI LE MOT DE PASSE EN CLAIR CORRESPOND AU HASH SALE
        $tabAssoToken =
        [
            "email"             => Controller::filtrer("email"),
            "password"          => Controller::filtrer("password"),
        ];

        $tabLigne = Model::chercher("user", "email", $tabAssoToken["email"]);
        // POUR SAVOIR SI ON A TROUVE UNE LIGNE
        if (count($tabLigne) == 1)
        {
            // ON A UNE LIGNE QUI CORRESPOND A L'EMAIL ENTRE...
            // DEBUG
            // print_r($tabLigne);
            $passwordEnClair   = $tabAssoToken["password"];
            $passwordHasheSale = $tabLigne[0]["password"];
            // ON VA UTILISER LA FONCTION password_verify
            // https://www.php.net/manual/fr/function.password-verify.php
            // AVEC LE HASHAGE, SI ON A LA MEME SOURCE (MOT DE PASSE EN CLAIR + GRAIN DE SEL) 
            // ON ARRIVE AU MEME HASH
            $loginOK = password_verify($passwordEnClair, $passwordHasheSale);
            if ($loginOK)
            {
                // SCENARIO: BIENVENUE
                // DEBUG
                $login = $tabLigne[0]["login"];
                echo "BIENVENUE $login";

                // MESSAGE DE CONFIRMATION
                Controller::$tabAssoJson["confirmation"] = "BIENVENUE $login";

                // ON VERIFIE EN PLUS LE LEVEL AVANT DE RENVOYER LA CLE API
                if (100 <= $tabLigne[0]['level'])
                {
                    // ON VA EN PLUS RENVOYER LA CLE API (BAGDE D'ACCES)
                    Controller::$tabAssoJson["cleAPI"] = Config::$cleAdminAPI;
                }
                // ON PEUT AJOUTER PLUS DE CLES API SUIVANT LES DIFFERENTS LEVELS...

            }
            else
            {
                // SCENARIO: MAUVAIS IDENTIFIANTS
                // DEBUG
                echo "DESOLE, VERIFIEZ VOS IDENTIFIANTS";
                // MESSAGE DE CONFIRMATION
                Controller::$tabAssoJson["confirmation"] = "DESOLE, VERIFIEZ VOS IDENTIFIANTS";
            }
        }
        else
        {
            // MESSAGE DE CONFIRMATION (ATTENTION A LA CONFIDENTIALITE...)
            Controller::$tabAssoJson["confirmation"] = "DESOLE, VERIFIEZ VOTRE EMAIL";
        }
    }

    // VARIANTE SUR LE CREATE
    static function installer ()
    {
        // DEBUG
        echo "ApiUser::installer";

        // ON VA AJOUTER UNE SECURITE
        // ON NE REALISE LA CREATION QUE SI LA TABLE SQL user EST VIDE
        $nbLigne = Model::compter("user");

        // if ($nbLigne > 0) return;       // ON N'EXECUTE PAS LE CODE SUIVANT

        if ($nbLigne == 0)
        {
            $tabAssoToken =
            [
                "email"             => Controller::filtrer("email"),
                "login"             => Controller::filtrer("login"),
                "password"          => Controller::filtrer("password"),
                // COMPLETER LES COLONNES MANQUANTES
                "level"             => 100,                 // level = 100 POUR ADMIN
                "dateCreation"      => date("Y-m-d H:i:s"), // FORMAT DATETIME 2020-06-15 11:07:23
            ];
    
            if (Controller::isOK())
            {
                // AVANT D'INSERER LA LIGNE, ON VA HASHER LE MOT DE PASSE ET AJOUTER UN GRAIN DE SEL
                $passwordNonHashe = $tabAssoToken["password"];
                // https://www.php.net/manual/fr/function.password-hash.php
                $passwordHasheSale = password_hash($passwordNonHashe, PASSWORD_DEFAULT);
                // ON REMPLACE LE MOT DE PASSE EN CLAIR PAR LE MOT DE PASSE HASHE ET SALE
                $tabAssoToken["password"] = $passwordHasheSale;

                Model::insert("user", $tabAssoToken);
                Controller::$tabAssoJson["listeUser"] = Model::read("user");

                // ON PEUT AJOUTER PLUS DE CODE D'INSTALLATION
                // CREER LA CLE API...
                $cleAPiAleatoire = password_hash(uniqid(), PASSWORD_DEFAULT);
                $codeModele = file_get_contents("php/model/Config-modele.php");
                $codeFinal = str_replace("CLE-API-A-CHANGER", $cleAPiAleatoire, $codeModele);
                file_put_contents("php/model/Config.php", $codeFinal);

            }
        }
    }
}