<?php

class Controller 
{
    static function filtrer ($name)
    {
        $resultat = $_REQUEST[$name] ?? "";
        // IL FAUDRA AJOUTER PLUS DE SECURITE
        // ON ENLEVE LES ESPACES EN TROP (AU DEBUT ET A LA FIN)
        $resultat = trim($resultat);
        // ...
        return $resultat;
    }

    static function isOK ()
    {
        // A COMPLETER
        return true;
    }

}
