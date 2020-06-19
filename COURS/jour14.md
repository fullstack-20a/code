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

## SERVICE DE NEWSLETTER

https://mailchimp.com/pricing/


    PAUSE JUSQU'A 11H


## LOI DE PARETO 80/20

    GENERALEMENT 80% DU CODE D'UN PROJET EST ASSEZ STANDARD
    => CONSOMME 20% DU TEMPS DE DEV 
        (CAR LE CODE EST DEJA DISPONIBLE)

    MAIS 20% DU CODE D'UN PROJET EST SPECIFIQUE
    => CONSOMME 80% DU TEMPS DE DEV 
        (CAR LE CODE DOIT ETRE CREE DE ZERO...)

## CHARGEMENT AUTOMATIQUE DE CLASSE

    DANS PHP, IL Y AUSSI DES MECANISMES 
    DE CALLBACKS ET D'EVENEMENTS (SYNCHRONES...)
    (ALORS DANS JS, C'EST ASYNCHRONE...)

    QUAND PHP A BESOIN D'UNE CLASSE, IL DECLENCHE UN EVENEMENT 
    ET ON PEUT AJOUTER UN CALLBACK SUR CET EVENEMENT

    => PERFORMANCE TRES INTERESSANTES
        => PHP NE CHARGE QUE LE CODE DONT PHP A BESOIN
        => PHP NE CHARGE CE CODE QUE AU MOMENT OU IL EN A BESOIN

    https://www.php.net/manual/fr/function.spl-autoload-register.php

```php
// ON PEUT AJOUTER UN CALLBACK
function chargerCodeClasse($nomClasse)  // PHP FOURNIRA LA VALEUR A CE PARAMETRE
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

spl_autoload_register("chargerCodeClasse");

```

    PAUSE DEJEUNER JUSQU'A 13H35... BON APP ;-p


## ACTIVITE POUR CET APRES-MIDI

    * projet fin formation
    * autonomie pour préparer l'évaluation php-sql intermédiaire
        (s'entrainer à coder un crud sur une table sql... newsletter et contact...)
    * ???

    AUTONOMIE ET QUESTIONS AU BESOIN...

## DEMARRER UN PROJET

    * LISTE DES PAGES
    * LISTE DES TEMPLATES
    * DISTINGUER LE CONTENU STATIQUE DU CONTENU DYNAMIQUE
        CONTENU STATIQUE    => CODE EN DUR EN PHP
        CONTENU DYNAMIQUE   => STOCKE DANS DES TABLES SQL
                                    => CRUD SUR CHAQUE SQL
    * LISTE DES FORMULAIRES

    DETERMINER LES SCENARIOS PRIORITAIRES
    => PERSONA
    => Minimum Viable Product
    => QU'EST-CE QU'ON PEUT FAIRE AVEC VOTRE SITE/APP ?


## CARTO EN JS

    * SIMPLE ET RAPIDE POUR DEMARRER

    https://leafletjs.com/examples/mobile/

    * PLUS COMPLET MAIS PLUS COMPLIQUE

    https://developers.google.com/maps/documentation/javascript/adding-a-google-map?hl=fr


