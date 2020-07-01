<?php

// RECEPTIONNE LES INFOS DE FORMULAIRES
// ET QUI TRAITE LE FORMULAIRE EN INSERANT UNE NOUVELLE LIGNE SQL

// FONCTIONS DE FILTRAGE
function filtrerEntier ($name)
{
    $valeur = $_REQUEST[$name] ?? "";
    $valeur = intval($valeur);

    return $valeur;
}

// CODE MINIMUM EVALUATION

// SECURITE: TOUT DEVRAIT ETRE FILTRE...
// RECEPTIONNER LES INFOS DIRECTEMENT DANS LE TABLEAU ASSOCIATIF DES TOKENS
$tabAssoToken =
[
    "login"         => $_REQUEST["login"],
    "password"      => $_REQUEST["password"],
];


// SECURITE... 

// AJOUTER UNE LIGNE DANS LA TABLE SQL
// REQUETE SQL PREPAREE AVEC TOKEN
// TABLEAU ASSOCIATIF TOKEN / VALEUR
$requeteSQL =
<<<codesql

INSERT INTO user
( login, password )
VALUES
( :login, :password )

codesql;

// ENVOYER LA REQUETE SQL (CREATE)
// NE PAS OUBLIER DE CHANGER LE NOM DE LA DATABASE
$dbname             = "multicrud";
$objetPDO           = new PDO("mysql:host=localhost;port=3306;dbname=$dbname;charset=utf8", "root", "");   
$objetPDOStatement  = $objetPDO->prepare($requeteSQL);
$objetPDOStatement->execute($tabAssoToken);




