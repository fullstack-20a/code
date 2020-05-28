# PHP02

## EXERCICE

    CREER UN SITE VITRINE EN HTML, CSS ET JS
    AVEC 3 PAGES

    accueil
        * plusieurs sections et plusieurs colonnes
    galerie
        * afficher une galerie avec quelques images
        * miniatures et image principale
            * ajouter js pour interactivité
            * si je clique sur une image miniature on voit l'image en grand
    contact
        * formulaire de contact


    POUR LE MOMENT, QUAND ON CREE UN SITE, ON A UN FICHIER HTML PAR PAGE
    * accueil   => index.html
    * galerie   => galerie.html
    * contact   => contact.html

    (LE NOM DU FICHIER EST UTILISE PAR GOOGLE POUR LE REFERENCEMENT...SEO...)

    ENSUITE, JE PEUX A CODER LE HTML DE index.html
    UNE FOIS QUE LA PAGE index.html EST CODEE
    JE PEUX COPIER LE CODE POUR CREER LES AUTRES PAGES
    galerie.html
    contact.html


    UNE PROBLEMATIQUE:
    ON DUPLIQUE LE CODE COMMUN DANS CHAQUE PAGE
    (header, footer)
    ET C'EST PENIBLE DE CHANGER DANS CHAQUE FICHIER 
    LE CODE A CHAQUE MODIFICATION DEMANDEE PAR LE CLIENT

    => PHP VA NOUS AIDER
    => PHP COMME MOTEUR DE TEMPLATE
    => OUTIL QUI NOUS AIDE A CREER DES TEMPLATES PLUS FACILEMENT


## PHP

    PUBLIE EN 1994 PAR RASMUS LERDORF
    VERSION ACTUELLE 7.4...

    SITE OFFICIEL
    https://www.php.net/

    DOCUMENTATION BIEN TRADUITE EN FRANCAIS
    https://www.php.net/manual/fr/

    A LIRE DANS VOS MOMENTS PERDUS...

## COMMENT ON PASSE DE HTML A PHP ?

    MALIN:
    IL SUFFIT DE CHANGER LE SUFFIXE DU FICHIER DE .html A .php
    (ATTENTION: NE PAS OUBLIER LES URLS DANS LES LIENS...)

    => COOL
    => ON OBTIENT LE MEME RESULTAT

    LE NAVIGATEUR OBTIENT LE MEME RESULTAT (LE MEME CODE HTML)
    MAIS COTE SERVEUR APACHE FAIT APPEL AU PROGRAMME PHP EN PLUS
    => ON A UNE CONSOMMATION SUPPLEMENTAIRE DE RESSOURCES...

    HTML
    => SITES STATIQUES
    PHP 
    => SITES DYNAMIQUES

    Php
    HyperText           => Liens Hypextextes => HyperText Markup Language
    PreProcessor

    => PHP EST UN PRE-PROCESSEUR DE HTML
    => PHP EST UN OUTIL POUR CREER DU HTML

    MAINTENANT ON NE VA QUE CREER DES FICHIERS .php (ET PAS .html)
    => COOL ON ENTRE DANS L'UNIVERS PHP
    => ON VA POUVOIR PROFITER DES AVANTAGES DE PHP

    SI ON VEUT ECRIRE DU CODE PHP
    IL ONT GARDE LA PHILOSOPHIE DE LA BALISE OUVRANTE ET FERMANTE

    <?php
    // ICI ON POURRA ECRIRE DU CODE PHP
    ?>

    DECOUPER
    => CENTRALISER LES CODES QUI SE REPETENT DANS UN FICHIER COMMUN


    PAUSE JUSQU'A 11H05...


## DRY DON'T REPEAT YOURSELF

    DRY
    DON'T
    REPEAT
    YOURSELF

    LE DEVELOPPEUR EST UN FLEMMARD
    ET DONC IL EVITE DE DUPLIQUER DU CODE
    => CENTRALISER LES CODES COMMUNS


## ATTENTION AUX CHEMINS POUR PHP OU POUR HTML

    ON VA UTILISER PLEIN DE CHEMINS VERS DES FICHIERS
    QUAND VOUS ETES DANS DES BALISES PHP => CHEMINS POUR PHP    (SERVEUR)
    QUAND VOUS ETES DANS DES BALISES HTML => CHEMINS POUR HTML  (NAVIGATEUR)


## ORGANISATION EN MVC

    MVC
    Model           => CODE POUR GERER LE STOCKAGE DES DONNEES (SQL)
    View            => CODE POUR GERER L'AFFICHAGE (HTML)
    Controller      => CODE POUR GERER LES INTERACTIONS AVEC L'EXTERIEUR (FORMULAIRES)

    COMME ON VA AVOIR BEAUCOUP DE CODE PHP
    ON VA SUIVRE LA RECOMMENDATION D'ORGANISATION EN MVC

    php/
    php/model/
    php/view/
    php/controller/


## SECURISATION AVEC APACHE

    ON PEUT PROTEGER UN DOSSIER AVEC UN FICHIER DE PARAMETRAGE
    .htaccess

    https://httpd.apache.org/docs/2.4/fr/howto/access.html

    ET ON RAJOUTE LE PARAMETRAGE 

    Require all denied

    LE NAVIGATEUR N'AURA PLUS ACCES AU DOSSIER
    => Accès interdit!
    => Erreur 403


    PHP EST A L'INTERIEUR DU SERVEUR WEB
    => IL N'EST PAS CONCERNE PAR CE BLOCAGE DU .htaccess


## PHP COMME LANGAGE DE PROGRAMMATION


JS COMME LANGAGE DE PROGRAMMATION
PHP EST AUSSI UN LANGAGE DE PROGRAMMATION
JS ET PHP FONT PARTIE DE LA MEME FAMILLE (LANGAGE C, C++, JAVA, etc...)

```php
<?php

// LIGNE DE COMMENTAIRE
/*
    BLOC DE COMMENTAIRE
*/

?>
```


## EXTENSION A VSCODE: PHP Intelephense

    PHP Intelephense
    bmewburn.vscode-intelephense-client
    Ben Mewburn

## VARIABLES ET VALEURS

    UNE VARIABLE SERT A STOCKER UNE INFORMATION (VALEUR)
    PHYSIQUEMENT: UNE VARIABLE EST UN BOUT DE LA MEMOIRE VIVE

    UNE VALEUR EST UNE INFORMATION QUI POURRA ETRE STOCKEE DANS UNE VARIABLE

    ON VA AVOIR DE BESOIN DE STOCKER DE NOMBREUSES INFORMATIONS
    => ON VA DONNER DES NOMS AUX VARIABLES POUR LES DIFFERENCIER

    EN PHP, TOUS LES NOMS DE VARIABLES COMMENCENT PAR $

    POUR MEMORISER UNE VALEUR DANS UNE VARIABLE, ON PASSE PAR L'OPERATEUR =
    // = OPERATEUR D'AFFECTATION

    $nom = "georges";

## VALEUR TEXTE

    COMME PHP SERT A CREER DU HTML
    ON VA BEAUCOUP MANIPULER DES TEXTES

    $nom = "georges";
    $nom = 'georges';

    // IL Y AURA D'AUTRES POSSIBILITES...

## AFFICHAGE AVEC echo

    SI VOUS VOULEZ AFFICHER UN TEXTE POUR LE NAVIGATEUR
    ON VA UTILISER echo

```php

        <h1><?php echo "Mon Site Vitrine" ?></h1>
        <?php $h1 = "Mon Site Vitrine" ?>
        <h1><?php echo $h1 ?></h1>
```

## OPERATEUR COALESCENT ??

    ATTENTION: DEPUIS PHP7.x

    PERMET DE DONNER UNE VALEUR PAR DEFAUT SI LA VARIABLE AVANT N'EXISTE PAS

```php

    <h1><?php echo $h1 ?? "TITRE PAR DEFAUT" ?></h1>

```

## require_once

    https://www.php.net/manual/fr/function.require-once.php

    PERMET DE RECOMPOSER LES FICHIERS PHP POUR PRODUIRE LA PAGE HTML

    COOL AVEC LES VARIABLES:
    ON PEUT CREER UNE VARIABLE DANS UN FICHIER 
    ET ENSUITE UTILISER CETTE VARIABLE DANS UN AUTRE FICHIER CHARGE AVEC require_once

    
## ACTIVITE POUR CET APRES-MIDI

    REPRENDRE LE SITE VITRINE CODE EN HTML (HIER)
    ET LE PASSER EN PHP...

    CONTEXTE HISTORIQUE:
    COMMENT IL Y A 25 ANS, LES SITES SONT PASSES DE HTML A PHP

    CONTEXTE ENTREPRISE:
    DANS UNE EQUIPE, CHAQUE ETAPE PEUT ETRE CONFIEE A UNE PERSONNE DIFFERENTE
    GRAPHISTE/WEB DESIGN    => CREA AVEC PHOTOHSOP, ILLUSTRATOR, AFFINITY, SKETCH...
    INTEGRATEUR             => CODAGE DES MAQUETTES EN HTML, CSS, JS
    DEVELOPPEUR             => DECOUPAGE ET PASSAGE EN PHP



# ORGANISATION

    php02
    ├── README.md
    ├── assets
    │   ├── css
    │   │   └── style.css
    │   ├── img
    │   │   ├── photo.jpg
    │   │   └── photo4.jpg
    │   └── js
    │       └── main.js
    ├── contact.php
    ├── galerie.php
    ├── index.php
    └── php
        ├── controller
        ├── model
        └── view
            ├── footer.php
            ├── header.php
            ├── section-contact.php
            ├── section-galerie.php
            └── section-index.php


## COMPTE GITHUB AVEC REPOSITORY POUR LE CODE

    COPIE DU DOSSIER wf3/ SUR GITHUB

    https://github.com/fullstack-20a/code


