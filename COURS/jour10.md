# JOUR 10

## LIEN LIVESHARE

https://prod.liveshare.vsengsaas.visualstudio.com/join?3CC7ACC33EC9082382823A0ED9C1194AC94F


## NEWS / QUESTIONS


## PLANNING DE LA SEMAINE

    CRUD POUR PREPARER L'EXAMEN

    BLOG V2

    HTML
    CSS
    JS
    PHP
    SQL

    SQL
        => DATABASE             blogv2      AVEC CHARSET utf8mb4_general_ci
            => TABLES SQL
        article
            id                  INT             INDEX=PRIMARY A_I
            titre               VARCHAR(160)
            contenu             TEXT
            photo               VARCHAR(160)
            categorie           VARCHAR(160)
            datePublication     DATETIME
        user
            id                  INT             INDEX=PRIMARY A_I
            email               VARCHAR(160)
            login               VARCHAR(160)
            password            VARCHAR(160)
            level               INT
            dateCreation        DATETIME
        newsletter
            id                  INT             INDEX=PRIMARY A_I
            email               VARCHAR(160)
            nom                 VARCHAR(160)
            dateInscription     DATETIME
        contact
            id                  INT             INDEX=PRIMARY A_I
            email               VARCHAR(160)
            nom                 VARCHAR(160)
            message             TEXT
            dateReception       DATETIME



## CODE PHP

    => 1 CRUD PAR TABLE SQL
    PHP
            => FORMULAIRES
                    TRAITEMENT DE FORMULAIRE
                        ApiArticle
                        ApiUser
                        ApiNewsletter
                        ApiContact


    CREER UNE PAGE crud-article.php
        AJOUTER LE CODE HTML DU FORMULAIRE
        (ASTUCE: UTILISER LE NOM DES COLONNES COMME name="...")

    PAUSE JUSQU'A 10H55

## ATTAQUE PAR INJECTION SQL

            /*
            // ASTUCE
            extract($tabAssoToken);
            // => CREE LES VARIABLES A PARTIR DES CLES

            // ICI ON UTILISE DU CODE QUI VIENT DE L'EXTERIEUR
            // ET ON LE CONCATENE POUR CREER NOTRE REQUETE SQL
            // => ATTAQUE PAR CHEVAL DE TROIE (INJECTION SQL)
            // A B C
            // B EST CE QUI VIENT DE L'EXTERIEUR
            // UN HACKER PEUT DETOURNER B EN B C X A B
            // A B C X A B C
    INSERT INTO article ( titre, contenu, photo, categorie, datePublication ) 
    VALUES ( 'test1130', 'contenu1130', 'assets/img/photo1.jpg', 'test', '2020-06-15 11:36:33' )

    === A ===
    INSERT INTO article ( titre, contenu, photo, categorie, datePublication ) 
    VALUES ( 'test1130', '

    === B ===
    contenu1130

    === C ===
    ', 'assets/img/photo1.jpg', 'test', '2020-06-15 11:36:33' )


    === ATTAQUE ===
    contenu1130', 'assets/img/photo1.jpg', 'test', '2020-06-15 11:36:33' );
    DELETE FROM article;
    INSERT INTO article ( titre, contenu, photo, categorie, datePublication ) 
    VALUES ( 'test1130', 'contenu1130

            // ADRESSE IP DE L'UTILISATEUR
            $ip = $_SERVER["REMOTE_ADDR"];

            // EN PHP: ON CONCATENE AVEC DES INFOS DANGEREUSES
            $requeteSQL =
    <<<CODESQL

    INSERT INTO article
    ( titre, contenu, photo, categorie, datePublication )
    VALUES
    ( '$titre', '$contenu', '$photo', '$categorie', '$datePublication' )

    CODESQL;
            
            echo $requeteSQL;

            Model::envoyerRequeteSQL($requeteSQL, []);


            */


## SQL DELETE

    https://sql.sh/cours/delete

    COMME DANS SELECT, ON AJOUTE UNE CLAUSE WHERE POUR SELECTIONNER LES LIGNES A SUPPRIMER.
    LA PLUPART DU TEMPS, ON UTILISE LA COLONNE id QUI SERT D'IDENTIFIANT UNIQUE POUR CHAQUE LIGNE.

```sql

DELETE FROM `article`
WHERE id = 15

```

    Attention : s’il n’y a pas de condition WHERE alors toutes les lignes seront supprimées et la table sera alors vide.


    PAUSE DEJEUNER JUSQU'A 13H40
