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

    PAUSE JUSQU'A 10H55

