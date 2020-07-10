# JOUR 23

## LIVESHARE

https://prod.liveshare.vsengsaas.visualstudio.com/join?09A7A469E98313E1424BE1CC630E07CBBF8B

## NEWS / QUESTIONS

## SYMFONY

    FRAMEWORK BACK
        BIBLIOTHEQUE CODE
        + ORGANISATION DOSSIERS/FICHIERS

    PHP
    SQL
    ET AUSSI HTML...

    HISTORIQUE
    PREMIERE VERSION 2005
    CREE PAR FABIEN POTENCIER (FRANCAIS...)

    (ANCIEN COURS...SUR SYMFONY3... POUR VOIR LA TETE DE FABIEN POTENCIER...)
    https://openclassrooms.com/fr/courses/3619856-developpez-votre-site-web-avec-le-framework-symfony

    (COURS SUR SYMFONY4)
    https://openclassrooms.com/fr/courses/5489656-construisez-un-site-web-a-l-aide-du-framework-symfony-4


    SITE OFFICIEL
    https://symfony.com/

    DOCUMENTATION
    https://symfony.com/doc/current/index.html


    LES VERSIONS DE SYMFONY
    https://symfony.com/doc/4.0/contributing/community/releases.html

    SYMFONY2    VERSION STABLE QUI A DONNE LA POPULARITE AU FRAMEWORK
                    POUR LES GROS PROJETS D'ENTREPRISE
                    => PENSE POUR DES EQUIPES DE DEVELOPPEURS
                CONSTRUIT AVEC PLEIN DE BUNDLES
                => UN PROJET SE DECOUPE EN PLUSIEURS BUNDLES (PARTIES)

    SYMFONY3    VERSION SIMPLIFIEE DE SYMFONY2
                LES DEVS TROUVENT QUE LES BUNDLES C'EST TROP COMPLIQUE
                => ON CREE UN SEUL BUNDLE POUR TOUT LE PROJET

    SYMFONY4    VERSION SIMPLIFIEE DE SYMFONY3
                (INSTALLATION MINIMALE 1/3 COMPARE A SYMFONY3...)
                => IL Y A DEJA UN BUNDLE App POUR LE PROJET MAIS ON N'EN PARLE PLUS...

    LTS ACTUELLE SYMFONY 4.4    => END OF MAINTENANCE   NOV 2022

    https://symfony.com/releases

    SYMFONY5    BONNE NOUVELLE => PAS DE GRAND CHANGEMENT COMPARE SYMFONY4
                (PAR CONTRE, IL CONTINUE A Y AVOIR PAS MAL DE CHANGEMENTS...)

    SUIVRE LE BLOG POUR SAVOIR LES NOUVEAUTES QUI ARRIVENT...
    https://symfony.com/blog/

## BUSINESS MODEL AVEC SENSIO LABS ET SYMFONY SAS...

    SENSIO LABS 
    => ENTREPRISE QUI GERAIT LE DEVELOPPEMENT DE SYMFONY
        (FABIEN POTENCIER ETAIT LE DIRIGEANT...)

    FRAMEWORK OPEN SOURCE ET GRATUIT


    https://sensiolabs.com/fr/
    SENSIO LABS VEND DU CONSULTING, DU DEVELOPPEMENT 
    ET AUSSI DES FORMATIONS AVEC DES CERTIFICATIONS OFFICIELLES SYMFONY
    => CERTIFICATIONS TRES DIFFICILES
    => "GARANTIE D'EXCELLENCE TECHNIQUE"

    EN JANVIER 2019, SMILE A RACHETE SENSIO LABS
    https://www.lemondeinformatique.fr/actualites/lire-smile-plus-pres-du-framework-symfony-avec-sensiolabs-73935.html

    ET FABIEN POTENCIER EST PARTI POUR FONDER SYMFONY SAS
    https://symfony.com/blog/symfony-sas-is-now-an-official-training-center-in-france
    DEPUIS JUIN 2020, SYMFONY SAS EST ORGANISME DE FORMATION

    AJOUT DE NOUVEAUX SERVICES DONT HEBERGEMENT EN CLOUD SPECIALISE SYMFONY...
    https://symfony.com/cloud/

    FABIEN POTENCIER A ECRIT UN LIVRE SUR SYMFONY 5
    => MAIS IL EST PAYANT... (30 EUROS...)
    https://symfony.com/book

## CONCURRENCE DANS LES FRAMEWORKS PHP

    * SYMFONY   
    => EN FRANCE POPULAIRE DU FAIT DES ENTREPRISES QUI FOURNISSENT LES SERVICES PRO
    => INTERNATIONAL MOINS POPULAIRE QUE LARAVEL
    MVC
    IL Y A AUSSI DU CODE D'AUTRES BIBLIOTHEQUES PHP

    * LARAVEL   
    => PLUS POPULAIRE   (ORIENTE EFFICACITE... PLUS SIMPLE A UTILISER...)
    MVC
    https://laravel.com/
    PREMIERE VERSION 2011
    (ILS REPRENNENT DU CODE DE LA BIBLIOTHEQUE SYMFONY, MAIS ILS FONT UN AUTRE FRAMEWORK)

    * ZEND FRAMEWORK   
    => PLUS COMPLIQUE ET MOINS POPULAIRE QUE SYMFONY 
    MVC
    (CREE PAR ZEND QUI FAIT LES MOTEURS PHP QU'ON UTILISE...)
    DELAISSE ET REPRIS PAR UNE COMMUNAUTE 
    => RENOMME EN LAMINAS...


    PAUSE JUSQU'A 11H...

## INSTALLATION DE SYMFONY


    https://symfony.com/doc/current/setup.html

    ESSAYER LA COMMANDE POUR VERIFIER SI COMPOSER EST INSTALLE

    composer -v

    SUR WINDOWS
    * TELECHARGER LE FICHIER .exe ET LE LANCER...

    https://getcomposer.org/Composer-Setup.exe

    CHOISIR LA VERSION DU MOTEUR PHP...

    COMPOSER EST UN OUTIL QUI PERMET D'INSTALLER DU CODE POUR UN PROJET PHP
    (comme nodejs...)


    * POUR INSTALLER UN PROJET SYMFONY, ON PASSE PAR UNE COMMANDE composer

    composer create-project symfony/website-skeleton cours-symfony

    OU SI VOUS AVEZ INSTALLE AVEC php

    php composer.phar create-project symfony/website-skeleton cours-symfony


## CONFIGURATION POUR LE SERVEUR APACHE

    https://symfony.com/doc/current/setup/web_server_configuration.html

    CHANGER DE DOSSIER POUR ALLER DANS LE DOSSIER QUI CONTIENT LE PROJET SYMFONY

    cd cours-symfony

    composer require symfony/apache-pack

    SI ON COPIE LE FICHIER composer.phar DANS LE DOSSIER cours-symfony
    php composer.phar require symfony/apache-pack

    SINON
    php ../composer.phar require symfony/apache-pack

    ATTENTION: 
    NE PAS FAIRE PLUSIEURS ENTREES "RETOUR CHARIOT"
    PARCE QUE LE SCRIPT POSE UNE QUESTION ET IL FAUT REPONDRE y 
    ET ENSUITE FAIRE LE RETOUR CHARIOT


    AU BOUT DU SCRIPT...
    SI TOUT S'EST BIEN PASSE, DANS LE DOSSIER public/
    ON A UN FICHIER .htaccess

    ET ON PEUT ALLER DANS LE NAVIGATEUR AFFICHER LA PAGE RACINE DU SITE
    http://localhost/wf3/cours-symfony/public/

    ET DONC ON DEVRAIT VOIR LE LOGO SYMFONY AVEC LA VERSION INSTALLEE...

## CREER UNE PAGE DANS SYMFONY

    https://symfony.com/doc/current/page_creation.html


    EXEMPLE:
    ON VEUT CREER UNE PAGE toto
    AVEC CETTE URL
    http://localhost/wf3/cours-symfony/public/toto

    ON DOIT CREER UNE CLASSE DANS LE DOSSIER src/Controller/
    PAR CONVENTION, LE NOM DE LA CLASSE DOIT FINIR PAR Controller



    PAUSE DEJEUNER... REPRISE A 13H40...

## UTILISER LA CONSOLE POUR CREER UNE BASE DE CODE

    DANS LE DOSSIER bin
    ON A LE PROGRAMME console

    DANS LE TERMINAL, IL FAUT ETRE DANS LE DOSSIER cours-symfony/

    php bin/console

    => ON PEUT UTILISER PHP EN LIGNE DE COMMANDE DANS LE TERMINAL

    php bin/console
    => ON VEUT EXECUTER LE CODE PHP DANS LE FICHIER bin/console

    ON VA UTLISER LA COMMANDE
    make:controller                         Creates a new controller class

    POUR LANCER LA CREATION D'UNE CLASSE Controller...

    php bin/console make:controller

    ON VA AVOIR UN SCRIPT QUI GENERE UNE BASE DE CODE...

    Choose a name for your controller class (e.g. OrangeElephantController):
    > AccueilController

    created: src/Controller/AccueilController.php
    created: templates/accueil/index.html.twig

    => LE CODE HTML EST MAINTENANT DANS DES FICHIERS SEPARES
    => AU FORMAT TWIG

## TWIG POUR LES TEMPLATES

    UN COMPOSANT DE SYMFONY MAIS QUI PEUT ETRE UTILISE EN DEHORS DE SYMFONY

    (NOTE: LARAVEL UTILISE BLADE QUI SE MELANGE AVEC DU CODE PHP)

    https://twig.symfony.com/

    PHP N'EST PAS UN BON MOTEUR DE TEMPLATE SELON TWIG
    TWIG EST UN MOTEUR DE TEMPLATE ECRIT EN PHP
    ET QUI PROPOSE LE LANGAGE TWIG A LA PLACE DU CODE PHP...

    DEPUIS QUELQUES ANNEES, PLUSIEURS CMS ONT DECIDE DE MIGRER LEUR CODE SUR SYMFONY...
    * LE CMS DRUPAL DEPUIS DRUPAL8 A BASCULE SON CODE SUR SYMFONY
        DRUPAL9 VIENT DE SORTIR EN JUIN 
        ET EST BASEE SUR LA LTS SYMFONY 4.4
        https://www.drupal.org/docs/understanding-drupal/drupal-9-resources

    * PRESTASHOP QUI A COMMENCE A MIGRER LA PARTIE TEMPLATE VERS TWIG
        https://devdocs.prestashop.com/1.7/development/architecture/migration-guide/templating-with-twig/


## EXERCICE: CREER DES PAGES ET DES TEMPLATES TWIG POUR AFFICHER CES PAGES

    IL MANQUE 
    * COMMENT RELIER LE HTML AVEC UN FICHIER CSS
    * COMMENT RELIER LE HTML AVEC UN FICHIER JS
    * COMMENT RELIER LE HTML AVEC UN FICHIER IMG
    * COMMENT CREER UN MENU POUR NAVIGUER ENTRE LES PAGES
    * ...


## JS ET REFERENCEMENT

    https://developers.google.com/search/docs/guides/javascript-seo-basics?hl=fr

    Gardez à l'esprit que l'affichage côté serveur ou le pré-affichage est recommandé, 
    car il permet aux utilisateurs et aux robots d'exploration d'accéder à votre site plus rapidement. 
    De plus, tous les robots n'utilisent pas forcément JavaScript.

    https://developers.google.com/search/docs/guides/get-started?hl=fr


    PAUSE JUSQU'A 15H55...



