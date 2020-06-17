<?php

class ApiUser
{
    // METHODES
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
                Model::insert("user", $tabAssoToken);
                Controller::$tabAssoJson["listeUser"] = Model::read("user");
            }
        }
    }
}