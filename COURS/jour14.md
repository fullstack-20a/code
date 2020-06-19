# JOUR 14

## LIVESHARE

https://prod.liveshare.vsengsaas.visualstudio.com/join?9D4130C8F7734E28A8302273FBE3C1CFC4EB

## NEWS / QUESTIONS

### TELECHARGER DES VIDEOS YOUTUBE

https://github.com/ytdl-org/youtube-dl/blob/master/README.md#readme

### CONVERTIR LES VIDEOS

https://ffmpeg.org/


## PLANNING DE LA JOURNEE

    * page accueil avec formulaire newsletter
    * page contact avec formulaire de contact
    * page recherche avec les résultats de recherche

    * ajouter crud-user.php crud-newsletter.php crud-contact.php
    * update des articles pour upload

    * amélioration du code
    * automatisation du code

    * autres ???

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
