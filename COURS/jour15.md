# jour 15

## lien liveshare

https://prod.liveshare.vsengsaas.visualstudio.com/join?E33909CD95B4FEF83BA428ABBE88589E718E

## NEWS / QUESTIONS


## CSR vs SSR

    Client Side Rendering
        ON UTILISE JS POUR CREER LE HTML (DE LA LISTE DANS LA TABLE HTML...)

    Server Side Rendering
        ON UTILISE PHP POUR CREER LE HTML (DE LA LISTE DANS LA TABLE HTML...)


    PAUSE JUSQU'A 10H50

## EXERCICE SUR LE CRUD

    ON PEUT CREER UNE NOUVELLE DATABASE boutique    
        AVEC CHARSET utf8mb4_general_ci

    DEFINIR UNE TABLE SQL   telephone
    id              INT             INDEX=PRIMARY       A_I
    modele          VARCHAR(160)
    prix            DECIMAL(10,2)                           //  ATTENTION: 10 CHIFFRES EN TOUT DONT 2 DECIMALES
    photo           VARCHAR(160)
    description     TEXT
    noteVendeur     INT
    dateProduit     DATETIME
    stock           INT

    CONSEIL: SI VOUS AVEZ DU MAL COMMENCER AVEC MOINS DE 5 COLONNES...

    CREER UN DOSSIER php15
    ET DEDANS CREER UNE PAGE crud-telephone.php

    DECIMAL 10,2
    => 8 CHIFFRES ENTIERS ET 2 POUR LES DECIMALES
    12345678.90


    PAUSE DEJEUNER JUSQU'A 13H40...

    CONTINUER EN AUTONOMIE...
    CHECKPOINT A 14H15
    CHECKPOINT A 14H45
    CHECKPOINT A 15H15

## DATES ET AFFICHAGES

    LE FORMAT DATIME EN SQL
    PEUT ETRE CONVERTI EN TIMESTAMP AVEC LA FONCTION strtotime
    https://www.php.net/manual/fr/function.strtotime.php

    ET ENSUITE, LE TIMESTAMP PEUT ETRE RECONVERTI EN UN AUTRE FORMAT
    AVEC LA FONCTION date
    https://www.php.net/manual/fr/function.date.php
    (CONSULTER LES POSSIBILITES DE COMBINAISON DANS LA DOC...)

    $dateCreation   = "2020-06-22 15:03:25";
    $timestamp      = strtotime($dateCreation);
    $dateCible      = date("d/m/Y", $timestamp);     // => "22/06/2020"


    PRE REMPLIR LE CHAMP AVEC LA DATE ACTUELLE...

```html    
    <input type="text" value="<?php echo date("Y-m-d H:i:s") ?>">
```

## HTML PATTERNS

    SUR UN CHAMP DE FORMULAIRE, ON PEUT FORCER LE TEXTE SAISI A RESPECTER UN FORMAT

    https://www.w3schools.com/tags/att_input_pattern.asp

    http://html5pattern.com/

## BOUTON UPLOAD

    BRICOLAGE
    AJOUTER DU CSS POUR CACHER LA BALISE input
    ET AJOUTER UN LABEL (PERSONNALISABLE...)
    ET QUAND ON CLIQUE SUR LE LABEL, CA ACTIVE LE INPUT...

```html

    <label>
        <span>BOUTON PERSONNALISE</span>
        <input type="file" style="display:none">
    </label>

```

    PAUSE JUSQU'A 15H50...


## EVALUATION

    NE PAS METTRE LE SITE SUR WEBHOST (OU AUTRE) HEBERGEMENT INSTABLE...

    PAR CONTRE NE PAS OUBLIER DE FAIRE UNE ARCHIVE ZIP
        QUI CONTIENT L'EXPORT DE LA DATABASE SQL!!!


## PDO ET PDOStatement

    2 CLASSES PHP
    PDO
    PDOStatement

    https://www.php.net/manual/fr/book.pdo.php
    PDO GERE LA CONNEXION ENTRE LE MONDE PHP ET LE MONDE SQL
    POUR CREER UNE CONNEXION, ON CREE UN OBJET DE LA CLASSE PDO
    https://www.php.net/manual/fr/pdo.construct.php


    dbh DataBase Handler

```php

$dsn = 'mysql:dbname=testdb;host=127.0.0.1';
$user = 'dbuser';
$password = 'dbpass';

try {
    $dbh = new PDO($dsn, $user, $password);     
            // PHP DECLENCHE AUTOMATIQUEMENT L'APPEL A LA METHODE __construct (CALLBACK)

} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

```


    POUR SE PROTEGER CONTRE LES INJECTIONS SQL
    => ON UTILISE UN MOYEN DETOURNE POUR ISOLER LES INFOS EXTERIEURES
    => LA METHODE prepare PERMET D'UTILISER DES TOKENS/JETONS DANS LA REQUETE SQL
    => SQL VA PROTEGER LES PARTIES OU ON A INSERE DES TOKENS
        => SQL QUI VA FAIRE LA CONCATENATION POUR CREER LA REQUETE SQL FINALE A EXECUTER

    https://www.php.net/manual/fr/pdo.prepare.php
    => LA METHODE prepare ENVOIE UN 2E OBJET DE LA CLASSE PDOStatement
    => L'OBJET PDOStatement EST RESPONSABLE DE L'EXECUTION DE LA REQUETE SQL
            (AVEC UNE SEULE CONNEXION PDO, ON POURRAIT FAIRE PLUSIEURS REQUETES PDOStatement DIFFERENTES/SUCCESSIVES)

    ET ENSUITE, ON COMPLETE LES INFOS AVEC LA METHODE execute
    => ON ACTIVE LA METHODE execute SUR L'OBJET PDOStatement

    SUR LE CREATE, ON PEUT RECUPERER LE DERNIER id
    https://www.php.net/manual/fr/pdo.lastinsertid.php


    SUR LE READ (SELECT...)
    ON A BESOIN DE RECUPERER DANS LE MONDE PHP LES INFOS DES TABLES SQL
    (LES RESULTATS DE LA REQUETE SELECT...)

    POUR RETROUVER LES RESULTATS, ON A DIFFERENTES METHODES...
    https://www.php.net/manual/fr/pdostatement.fetchall.php

    fetchAll PERMET DE RECUPERER D'UN COUP TOUS LES RESULTATS DU SELECT
    => PHP VA CONSTRUIRE UN TABLEAU ORDONNE DE TABLEAUX ASSOCIATIFS
            (AVEC LE PARAMETRE PDO::FETCH_ASSOC)

    NOTE: DANS LA PLUPART DES CAS, ON VA AFFICHER UNE CENTAINE DE LIGNE
    => fetchAll NE CONSOMME PAS TROP DE RESSOURCES PHP
    => A EVITER SI UN ON A LANCE UN SELECT QUI RAMENE PLUSIEURS MILLIERS DE LIGNES...

    AVEC AJAX, EN PHP, SI ON A UN TABLEAU ASSOCIATIF
    => TRES FACILE DE PRODUIRE DU JSON AVEC LA FONCTION json_encode
    => fetchAll PRODUIT UN TABLEAU DE TABLEAUX ASSOCIATIFS 
    => COOL ;-p

    // EN PHP
    $tableauAssociatif = [
        "cle1"  => "valeur1",
        "cle2"  => "valeur2",
        "cle1"  => "valeur3",
    ];

    // EN JS
    var monObjet = {
        "propriete1": "valeur1",
        "propriete2": "valeur2",
        "propriete3": "valeur3"
    };

    // EN JSON
    // ON A SOUVENT UNE LISTE D'OBJETS DANS UN TABLEAU ORDONNE
    var monObjet = {
        "propriete1": [
            { "colonne1": "valeur11", "colonne2": "valeur12" },     // LIGNE 1
            { "colonne1": "valeur21", "colonne2": "valeur22" },     // LIGNE 2
            { "colonne1": "valeur31", "colonne2": "valeur32" }      // LIGNE 3
        ],
        "propriete2": "valeur2",
        "propriete3": "valeur3"
    };

