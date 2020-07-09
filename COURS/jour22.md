# JOUR 22

## LIVESHARE

https://prod.liveshare.vsengsaas.visualstudio.com/join?01F04726DF82E6C4AC0EBF6DDF0BBC6CBB6F

## NEWS / QUESTIONS

## PLANNING DU JOUR

    CREER UNE EXTENSION
    FILTRES
    CROCHETS (HOOKS...)

    * espace membre
    https://www.elegantthemes.com/blog/divi-resources/how-to-build-a-membership-site-with-divi-part-1

    * SITE DE RENCONTRE
    https://athemes.com/collections/best-dating-wordpress-themes/

    * RESEAU SOCIAL
    https://fr.wordpress.org/plugins/buddypress/
    https://buddypress.org/

    * GLISSER DEPOSER EN JS
    https://shopify.github.io/draggable/examples/
    https://github.com/Shopify/draggable/tree/master/examples

## CREER UNE EXTENSION

    https://developer.wordpress.org/plugins/

    DANS LE DOSSIER wp-content/plugins/

    SI ON VEUT UNE EXTENSION
    ON VA AJOUTER UN DOSSIER POUR LE CODE DE CETTE EXTENSION
    wp-content/plugins/monextension/

    ET ENSUITE AJOUTER UN FICHIER index.php

    ET AJOUTER L'ANNOTATION DANS LE FICHIER
```php
<?php
/**
 * Plugin Name: MON EXTENSION
 *  => ANNOTATION QUI DECLARE L'EXTENSION POUR WORDPRESS
 */

```

    VOILA, ON A CREE UNE EXTENSION QUI APPARAIT DANS LA PARTIE ADMIN
    ET ON PEUT L'ACTIVER...

    UNE EXTENSION PERMET DE SEPARER LES FONCTIONNALITES DU THEME
    ET DONC ON POURRA REUTILISER LES EXTENSIONS 
    SUR D'AUTRES PROJETS AVEC D'AUTRES THEMES

    SI ON COMPARE UN SITE WORDPRESS A UNE VOITURE
    WORDPRESS       MOTEUR
    THEME           CARROSSERIE
    EXTENSIONS      OPTIONS

## AJOUTER DU CODE DANS LA PAGE

    DANS LA MECANIQUE DE WORDPRESS, IL Y A PLEIN D'ETAPES 
    ET A CHAQUE ETAPE, WORDPRESS VA SIGNALER UN EVENEMENT
    ET ON PEUT AJOUTER UN CALLBACK SUR CES EVENEMENTS
    => HOOKS    (EN FRANCAIS: CROCHETS)

    https://developer.wordpress.org/plugins/hooks/

    PAR EXEMPLE:
    mon extension a besoin de rajouter une balise style dans le html

    https://developer.wordpress.org/reference/functions/add_action/

    https://developer.wordpress.org/reference/hooks/wp_head/    

    LA LISTE DES HOOKS DISPONIBLES... IL Y EN A PLEIN...
    https://developer.wordpress.org/reference/hooks/

    => COEUR DE LA MECANIQUE DE WORDPRESS
    => PERMET D'INTERVENIR POUR ENRICHIR/MODIFIER LE FONCTIONNEMENT DE WORDPRESS


## CLASS WPDB POUR GERER LES REQUETES SQL...

    https://codex.wordpress.org/Class_Reference/wpdb

    PAUSE JUSQU'A 10H55





