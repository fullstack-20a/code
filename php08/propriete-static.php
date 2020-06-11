<?php

class MaClasse
{
    // ON RANGE TOUT NOTRE CODE DANS UNE CLASSE

    // PROPRIETES static DE CLASSE (= UNE VARIABLE RANGEE DANS UNE CLASSE)
    public static $propriete1 = "(ma valeur)";

    // METHODES static DE CLASSE(= UNE FONCTION RANGEE DANS UNE CLASSE)
    static function afficher ()
    {
        echo "(afficher)";
        echo MaClasse::$propriete1;
    }
}

// ON NE LE FAIT PLUS EN PROGRAMMATION ORIENTE OBJET
// => CAR LE CODE N'EST PAS RANGE DANS UNE CLASSE...
$texte = "GLOBALE"; // PREMIERE VARIABLE

class MaClasse2
{
    // METHODE static
    static function calculer ()
    {
        $texte = "LOCALE";  // DEUXIEME VARIABLE

        echo "(calculer)";
        echo MaClasse::$propriete1; // PROPRIETE STATIC

        $propriete1 = "nouvelle valeur";    // VARIABLE LOCALE
        MaClasse::$propriete1 = "ma nouvelle valeur";

        echo MaClasse::$propriete1; // PROPRIETE STATIC

    }
}

MaClasse::afficher();
MaClasse2::calculer();
// SI BESOIN
echo "(EN DEHORS DE CLASSE)";
echo MaClasse::$propriete1;
