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
