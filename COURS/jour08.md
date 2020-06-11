# JOUR 08

## LIEN LIVESHARE

https://prod.liveshare.vsengsaas.visualstudio.com/join?F10D474AC9C06206EDCF77205D1BD02D5AA8

## NEWS / QUESTIONS

## PLANNING

* PORTEE DE VARIABLES EN PHP
* FORMULAIRES ET PHP

## PORTEE DE VARIABLES EN PHP

    https://www.php.net/manual/fr/language.variables.scope.php

    PAUSE JUSQU'A 10H55

    RESUME

    EN PHP

    * ON A DES VARIABLES SUPER GLOBALES
    $GLOBALS
    $_REQUEST
    $_GET
    $_POST
    ...
    UN DEV NE PEUT PAS CREER DE VARIABLES SUPER GLOBALES
    (SEULEMENT FOURNIES PAR PHP)
    AVANTAGE: ON PEUT LES UTILISER PARTOUT 
    (A L'EXTERIEUR D'UNE FONCTION ET AUSSI DANS UNE FONCTION)

    * UN DEV PEUT CREER SES VARIABLES
    SI ON CREE DES VARIABLES DANS UNE FONCTION
    => ALORS ELLES SONT LOCALES
        ELLES SONT CREES ET DETRUITES A CHAQUE APPEL DE LA FONCTION

    SI ON CREE DES VARIABLES EN DEHORS DES FONCTIONS
    => ALORS ELLES SONT GLOBALES
    => ET SI ON VEUT LES UTILISER DANS UNE FONCTION
        IL FAUT L'ANNONCER AVANT AVEC LE MOT global

    MAIS AU FINAL, ON VA FAIRE DE LA PROGRAMMATION ORIENTE OBJET
    => PRINCIPE: ON RANGE NOTRE CODE DANS DES CLASSES
    => SI ON SUIT CE PRINCIPE, ON N'A PLUS DE VARIABLE GLOBALE...


    * SOIT ON UTILISE UNE VARIABLE LOCALE DANS UNE METHODE
    * SOIT ON UTILISE UNE PROPRIETE STATIC DE CLASSE
        (ON N'UTILISE PLUS DE VARIABLE GLOBALE...)

    class MaClasse
    {
        // PROPRIETES static
        public static $propriete = "ma valeur";

        // METHODES
        static function afficher ()
        {
            $texte = "coucou";    // VARIABLE LOCALE
            MaClasse::$propriete = "nouvelle valeur";   // PROPRIETE STATIC
        }
    }

    class MesProp
    {
        // TOUTES MES PROPRIETES
        public static $prop1 = "valeur1";
        public static $prop2 = "valeur2";
        public static $prop3 = "valeur3";
        public static $prop4 = "valeur4";

    }

    class MesMet 
    {
        // METHODES
        static function afficher ()
        {
        }

        static function calculer ()
        {
        }
    }


    PAUSE DEJEUNER JUSQU'A 13H40...
    
