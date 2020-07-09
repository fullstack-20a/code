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

```php
<?php
/**
 * Plugin Name: MON EXTENSION
 *  => ANNOTATION QUI DECLARE L'EXTENSION POUR WORDPRESS
 */

// ON PEUT AJOUTER DES SHORTCODES EN PLUS
// [carte]
function carte_func ()
{
    $codeHTML =
<<<CODEHTML
<h3 class="titre3">CARTE DU VIEUX PORT</h3> 
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2903.945422256656!2d5.3623260163391295!3d43.294464629135234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12c9c0c6a1843729%3A0x7d3f3acf189dc3b1!2sVieux-Port%20de%20Marseille!5e0!3m2!1sfr!2sfr!4v1594282114025!5m2!1sfr!2sfr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
CODEHTML;

    // ON RENVOIE COMME RESULTAT LE TEXTE QUI REMPLACE LE SHORTCODE
	return $codeHTML;
}

// ON AJOUTE LE CALLBACK SUR LE SHORTCODE [heure]
// https://developer.wordpress.org/reference/functions/add_shortcode/
add_shortcode( 'carte', 'carte_func' );


// AJOUTER DES HOOKS
function ajouterCss ()
{
    $codeHTML =
<<<CODEHTML

<style>
.titre3 {
    border: 2px solid orange;
}
footer {
    border: 2px solid orange;
}
</style>

CODEHTML;
    // ATTENTION: ON FAIT UN echo DIRECTEMENT
    echo $codeHTML;
}

// AJOUTER DU CODE AVANT LA BALISE FERMANTE </head>
add_action('wp_head', 'ajouterCss');

function ajouterJS ()
{
    $codeHTML =
<<<CODEHTML

<script>
console.log('CODE JS POUR MON EXTENSION');
</script>

CODEHTML;
    // ATTENTION: ON FAIT UN echo DIRECTEMENT
    echo $codeHTML;

}

// AJOUTER DU CODE AVANT LA BALISE FERMANTE </body>
add_action('wp_footer', 'ajouterJS');

```

## CLASS WPDB POUR GERER LES REQUETES SQL...

    https://codex.wordpress.org/Class_Reference/wpdb

    PAUSE JUSQU'A 10H55

## PERFORMANCES DE WORDPRESS AVEC EXTENSIONS

    LA MECANIQUE DES HOOKS RALENTIT LES PERFORMANCES DE WORDPRESS
    MAIS WORDPRESS RESTE BIEN CONCURRENTIEL COMPARE AUX AUTRES FRAMEWORKS/CMS...
    (AUTOUR DE 300 REQUETES/SECONDE...)

    https://kinsta.com/blog/php-benchmarks/


## FILTRES POUR MODIFIER LE CODE PRODUIT PAR WORDPRESS

    https://developer.wordpress.org/plugins/hooks/filters/

    DANS UN THEME ON UTILISE the_content() 
    POUR AFFICHER LE CONTENU D'UNE PAGE

    WORDPRESS DONNE DES MOYENS POUR MODIFIER CES CONTENUS...
    => FILTRES

    https://codex.wordpress.org/Plugin_API/Filter_Reference

```php

// AJOUTER UN FILTRE SUR LE CONTENU
function filtrer_contenu ($contenuEnCours)
{
    // ON VA POUVOIR MODIFIER/AJOUTER DU CONTENU
    $contenuFiltre = "<h1>AVANT</h1>$contenuEnCours<h1>APRES</h1>";

    // https://developer.wordpress.org/reference/functions/is_user_logged_in/
    if (! is_user_logged_in())
    {
        $contenuFiltre = "<h1>CONTENU RESERVE AUX MEMBRES</h1><button>ABONNEZ VOUS</button>";
    }

    // CENSURE BASIQUE...
    $contenuFiltre = str_replace("FUCK", "F**K", $contenuFiltre);

    return $contenuFiltre;
}
add_filter('the_content', 'filtrer_contenu');


```

## HEBERGEMENT MUTUALISE

    * 5 EUROS/MOIS SANS ABONNEMENT 
    https://www.o2switch.fr/hebergement-illimite/

    * PRO AVEC PROMO A 1 EURO/MOIS LA PREMIERE ANNEE
    https://www.ionos.fr/hebergement/hebergement-web#packs

## VPS OVH

    * KIMSUFI
    https://shop.gandi.net/fr/simplehosting/create?size=s%2B

    * VPS AUTOUR DE 5 EUROS/MOIS
    https://www.ovh.com/fr/order/vps/?v=3#/vps/build?selection=~(range~'Starter~flavor~'vps-starter-1-2-20~datacenters~(SBG~1)~pricingMode~'default)

## GANDI SIMPLE HOSTING

    * A PARTIR DE 10 EUROS/MOIS
    https://shop.gandi.net/fr/simplehosting/create?size=s%2B

## RECRUTEMENT

    https://www.maddyness.com/2020/07/02/les-developpeurs-divas-des-temps-numeriques/

    https://www.grandeecolenumerique.fr/sites/default/files/chiffrescles2019-a4.pdf

## AUTONOMIE

    PAUSE DEJEUNER JUSQU'A 13H35...

## ACTIVITES DE L'APRES-MIDI

    CONSTRUIRE LES BASES D'ESPACE MEMBRE

    INSTALLER UN NOUVEAU WORDPRESS 
        + WOOCOMMERCE 
        + THEME STOREFRONT 
        + CREER UN THEME ENFANT

    ...

## EXTENSION POUR DUPLIQUER OU DEMENAGER UN SITE

    https://fr.wordpress.org/plugins/duplicator/
    https://wpformation.com/migrer-wordpress-duplicator/


## MATERIAL DESIGN DE GOOGLE

    * COMPOSANTS WEB
    https://github.com/material-components/material-components-web/

## MDBOOTSTRAP

    https://mdbootstrap.com/

    * FRAMEWORK FRONT
        MATERIAL DESIGN
        BOOTSTRAP
        ANGULAR/REACT/VUE/JQUERY


    PAUSE JUSQU'A 15H45...

    AUTONOMIE POUR LE RESTE DE LA JOURNEE...

    










