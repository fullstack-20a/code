<?php

class Ajax
{
    // PROPRIETES STATIC
    public static $tabAssoJson = [];


    // METHODES STATIC
    static function traiterFormulaire ()
    {
        ob_start();

        // POUR ACTIVER debugDumpParams
        Model::$debug = true;

        $classeCible  = Controller::filtrer("classeCible");     // $name = "classeCible"
        $methodeCible = Controller::filtrer("methodeCible");
        $codeCible    = "Api$classeCible::$methodeCible";
        
        if (is_callable($codeCible))
        {
            $codeCible();
        }
        
        $debug = ob_get_clean();
        
        // ON VA PRODUIRE AVEC PHP DU TEXTE EN FORMAT JSON
        // => CELA PERMET DE RENVOYER PLUSIEURS INFORMATIONS
        // => JS VA FACILEMENT COMPRENDRE CE FORMAT JSON

        Ajax::$tabAssoJson["debug"]           = $debug;        
        // EN PHP LES TABLEAUX ASSOCIATIFS SONT TRES SIMILAIRES AUX OBJETS JS
        // => ON A UNE FONCTION json_encode POUR CONVERTIR UN TABLEAU ASSOCIATIF PHP EN JSON
        // https://www.php.net/manual/fr/function.json-encode.php

        // COOL: ON CONVERTIT LE TABLEAU EN CODE JS
        $texteJson = json_encode(Ajax::$tabAssoJson);
        
        // ON ENVOIE LE CODE JS VERS LE NAVIGATEUR
        echo $texteJson;
    }
}
