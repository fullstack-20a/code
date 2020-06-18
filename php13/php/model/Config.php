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


}
