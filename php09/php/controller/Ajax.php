<?php

class Ajax
{
    // PROPRIETES STATIC
    public static $tabAssoJson = [];


    // METHODES STATIC
    static function traiterFormulaire ()
    {
        ob_start();

        $classeCible  = Controller::filtrer("classeCible");     // $name = "classeCible"
        $methodeCible = Controller::filtrer("methodeCible");
        $codeCible    = "Api$classeCible::$methodeCible";
        
        if (is_callable($codeCible))
        {
            $codeCible();
        }
        
        $ancienAffichage = ob_get_clean();
        
        // ON VA PRODUIRE AVEC PHP DU TEXTE EN FORMAT JSON
        // => CELA PERMET DE RENVOYER PLUSIEURS INFORMATIONS
        // => JS VA FACILEMENT COMPRENDRE CE FORMAT JSON
        
        // EN PHP LES TABLEAUX ASSOCIATIFS, SONT TRES SIMILAIRES AUX OBJETS JS
        // => ON A UNE FONCTION json_encode POUR CONVERTIR UN TABLEAU ASSOCIATIF PHP EN JSON
        // https://www.php.net/manual/fr/function.json-encode.php
        Ajax::$tabAssoJson["propriete1"]      = "valeur1";
        Ajax::$tabAssoJson["propriete2"]      = "valeur2";
        
        // COOL: ON CONVERTIR LE TABLEAU EN CODE JS
        $texteJson = json_encode(Ajax::$tabAssoJson);
        
        // ON ENVOIT LE CODE JS VERS LE NAVIGATEUR
        echo $texteJson;
    }
}
