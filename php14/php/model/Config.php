<?php

// ON METTRA TOUS LES PARAMETRES A CHANGER POUR CHAQUE PROJET
class Config
{
    // PROPRIETES
    // CONFIG POUR SQL
    public static $dbnameSQL        = "blogv2";
    public static $userSQL          = "root";
    public static $passwordSQL      = "";
    public static $portSQL          = "3306";
    public static $hostSQL          = "localhost";

    // CONFIG POUR FORMULAIRE
    public static $cleAdminAPI      = '$2y$10$60tyMmQdDotbeZ5Dh3yp9eeuq4tjspSstK5b/TMEnoyzhuS8DC8jW';

    // EVITER D'ACCEPTER DES FICHIERS AVEC DES EXTENSIONS DANGEREUSES
    public static $listeExtensionOK = [ "jpg", "jpeg", "png", "gif", "svg", "mp3", "mp4" ];

    // TAILLE MAX DES FICHIERS UPLOAD (EN OCTETS)
    public static $sizeMaxUpload = 100000000;

    // TABLEAU DES TAILLES DE MINIATURES
    // ATTENTION: NE PAS OUBLIER DE CREER LES DOSSIERS assets/mini...
    public static $tabMiniature = [
        "200"   => "assets/mini200",        // CARRE QUE LA MINIATURE POURRA COUVRIR
        "400"   => "assets/mini400",
    ];


    // ON PEUT AJOUTER UN CALLBACK
    static function chargerCodeClasse($nomClasse)  // PHP FOURNIRA LA VALEUR A CE PARAMETRE
    {
        // ON DOIT AJOUTER LE CODE POUR CHARGER LE FICHIER QUI CONTIENT LE CODE
        // ASTUCE: LA CLASSE EST DANS UN FICHIER QUI REPREND LE NOM DE LA CLASSE
        // exemple: LA CLASSE Controller EST DANS LE FICHIER Controller.php
        // => ON PEUT AUTOMATISER LE CHARGEMENT DU FICHIER
        $cheminFichier = "php/*/$nomClasse.php";
        // https://www.php.net/manual/fr/function.glob.php
        $tabFichier = glob($cheminFichier);
        foreach($tabFichier as $fichier)
        {
            // ON A TROUVE UN FICHIER
            // DEBUG
            // echo "<h3>ON A TROUVE $fichier</h3>";
            // ON VA CHARGER SON CODE
            require_once $fichier;
        }
    }

    static function start ()
    {
        // https://www.php.net/manual/fr/function.spl-autoload-register
        spl_autoload_register("Config::chargerCodeClasse");
    }

}
