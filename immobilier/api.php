<?php

// RECEPTIONNE LES INFOS DE FORMULAIRES
// ET QUI TRAITE LE FORMULAIRE EN INSERANT UNE NOUVELLE LIGNE SQL

// CODE MINIMUM EVALUATION

// RECEPTIONNER LES INFOS DIRECTEMENT DANS LE TABLEAU ASSOCIATIF DES TOKENS
$tabAssoToken =
[
    "titre"       => $_REQUEST["titre"],
    "adresse"     => $_REQUEST["adresse"],
    "ville"       => $_REQUEST["ville"],
    "cp"          => $_REQUEST["cp"],
    "surface"     => $_REQUEST["surface"],
    "prix"        => $_REQUEST["prix"],
    "type"        => $_REQUEST["type"],
    // $photo      = filtrerUpload(); // $_REQUEST["type"];
    "photo"       => "",
    "description" => $_REQUEST["description"],
        
];


// SECURITE... 

// AJOUTER UNE LIGNE DANS LA TABLE SQL
// REQUETE SQL PREPAREE AVEC TOKEN
// TABLEAU ASSOCIATIF TOKEN / VALEUR
$requeteSQL =
<<<codesql

INSERT INTO logement
( titre, adresse, ville, cp, surface, prix, type, photo, description )
VALUES
( :titre, :adresse, :ville, :cp, :surface, :prix, :type, :photo, :description )

codesql;

// ENVOYER LA REQUETE SQL (CREATE)
// NE PAS OUBLIER DE CHANGER LE NOM DE LA DATABASE
$dbname             = "immobilier";
$objetPDO           = new PDO("mysql:host=localhost;port=3306;dbname=$dbname;charset=utf8", "root", "");   
$objetPDOStatement  = $objetPDO->prepare($requeteSQL);
$objetPDOStatement->execute($tabAssoToken);




