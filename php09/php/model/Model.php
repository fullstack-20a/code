<?php

class Model
{
    // PROPRIETES
    public static $debug = false;

    static function envoyerRequeteSQL ($requeteSQL, $tabAssoToken)
    {
        $database   = "blog";       // A CHANGER A CHAQUE PROJET    
        $host       = "127.0.0.1";
        $user       = "root";
        $password   = "";           // SAUF AVEC MAMP "root" (A VERIFIER...)
        $port       = "3306";       // MAIS PEUT ETRE AUTRE CHOSE "8889"
        $dsn        = "mysql:host=$host;port=$port;dbname=$database;charset=utf8";    
        $dbh        = new PDO($dsn, $user, $password);
    
        // AFFICHER LES ERREURS SQL COMME ERREURS PHP
        // https://www.php.net/manual/fr/pdo.error-handling.php
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        $pdoStatement = $dbh->prepare($requeteSQL);    
        $pdoStatement->execute($tabAssoToken);  

        if (Model::$debug)
        {
            $pdoStatement->debugDumpParams();
        }

        return $pdoStatement;  
    }
    
    // CREATE
    static function insert ($nomTable, $tabAssoToken)
    {
        $listeColonne = "";
        $listeToken   = "";
        // ON EXTRAIT DANS UN TABLEAU ORDONNE LES CLES DU TABLEAU ASSOCIATIF
        // https://www.php.net/manual/fr/function.array-keys
        $tabCle       = array_keys($tabAssoToken);
        // https://www.php.net/manual/fr/function.implode
        $listeColonne = implode("`, `", $tabCle);
        $listeToken   = implode(", :", $tabCle);    // ATTENTION IL MANQUE LE PREMIER :

        // MAINTENANT JE PEUX PREPARER MA REQUETE SQL
        $requeteSQL =
<<<CODESQL

INSERT INTO `$nomTable`
( `$listeColonne` )
VALUES
( :$listeToken )

CODESQL;

            Model::envoyerRequeteSQL($requeteSQL, $tabAssoToken);
    }
}
