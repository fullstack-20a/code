<?php

class ApiUser
{
    // METHODES

    static function login ()
    {
        // DEBUG
        echo "ApiUser::login";

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
            }
        }
    }
}