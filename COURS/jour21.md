# JOUR 21

## LIVESHARE

https://prod.liveshare.vsengsaas.visualstudio.com/join?24490297386DEE2ACAF1A475BEBBF4BA3AB3


## NEWS / QUESTIONS

### CSS

    CONSTRUIRE LES REGLES EN PARTANT DES BALISES PARENTES 
    ET PROGRESSIVEMENT AVANCER DANS LES BALISES ENFANTS

## LICENCE GPLv3 DANS WORDPRESS

    FICHIER license.txt...

    WordPress is released under the GPL

    https://fr.wikipedia.org/wiki/Licence_publique_g%C3%A9n%C3%A9rale_GNU

    https://www.gnu.org/licenses/gpl-howto.fr.html

    LA LICENCE GPL FORCE LE CODE A ETRE OPEN SOURCE

    MAIS LES FICHIERS PHP DES THEMES ET DES EXTENSIONS SONT AUSSI CONTAMINEES PAR LA LICENCE GPL

    (MAIS PAS LES FICHIERS JS, CSS, etc... QUI SONT CHARGES PAR LE NAVIGATEUR...)

## HIERARCHIE DES TEMPLATES DANS UN THEME


    index.php       EST LE TEMPLATE PAR DEFAUT
    page-templates/ ON PEUT AJOUTER DES TEMPLATES SUPPLEMENTAIRES (POUR LES PAGES, ...)
    ...

    WORDPRESS SUIT UN ARBRE DE DECISION POUR CHERCHER LE FICHIER DE TEMPLATE 
    QUI EST PRIORITAIRE QUAND IL AFFICHE UNE PAGE DANS LE NAVIGATEUR...

    https://developer.wordpress.org/themes/basics/template-hierarchy/

    QUAND LE NAVIGATEUR DEMANDE UNE URL
    (CONTROLLER)    WORDPRESS EXAMINE L'URL 
    (MODEL)         ET DETERMINE LE CONTENU ASSOCIE A CETTE URL
    (VIEW)          ET ENSUITE DANS LE THEME, 
                    WORDPRESS VA SELECTIONNER LE TEMPLATE LE PLUS PRIORITAIRE
                    POUR AFFICHER CE CONTENU

    * SCHEMA DE LA HIERARCHIE DES TEMPLATES
    https://developer.wordpress.org/files/2014/10/Screenshot-2019-01-23-00.20.04.png

    https://wphierarchy.com/

    * ET PRENDRE LE TEMPS DE LIRE LA DOCUMENTATION PLUS EN DETAIL...
    https://developer.wordpress.org/themes/basics/
    ...
    https://developer.wordpress.org/themes/basics/template-hierarchy/


    PAUSE JUSQU'A 10H50...


## EXERCICES: CREER DES TEMPLATES PLUS PRIORITAIRES QUE index.php


    CREER UN TEMPLATE POUR AFFICHER UN SAFARI DE MANIERE DIFFERENTE DES AUTRES PAGES...


## MAINTENANCE SUR LES SITES WORDPRESS

    WHODUNIT COMMUNIQUE DE MANIERE TRES TRANSPARENTE SUR LEUR FONCTIONNEMENT
    https://www.whodunit.fr/maintenance-wordpress/nos-offres-de-maintenance/


## SHORTCODES

    HISTORIQUEMENT, POUR PERMETTRE AUX UTILISATEURS D'INSERER UN CONTENU COMPLEXE
    LE DEVELOPPEUR VA PROPOSER DES SHORTCODES...
    (AVEC GUTENBERG ET LES BLOCS, LA TENDANCE EVOLUE VERS LA CREATION DE BLOCS POUR REMPLACER LES SHORTCODES...)

    COMMENT CREER UN SHORTCODE 
    https://codex.wordpress.org/Shortcode_API

    UN SHORTCODE EST COMME UNE BALISE AVEC DES []
    [monshortcode]
    WORDPRESS VA DETECTER CE SHORTCODE ET LE REMPLACER PAR UN CONTENU PLUS COMPLEXE

    https://developer.wordpress.org/reference/functions/add_shortcode/


    DANS LE FICHIER functions.php

```php

// AJOUTER NOS SHORTCODES
// https://codex.wordpress.org/Shortcode_API

// [heure]
function heure_func ()
{
    // ON RENVOIE COMME RESULTAT LE TEXTE QUI REMPLACE LE SHORTCODE
	return date("H:i:s");
}
// ON AJOUTE LE CALLBACK SUR LE SHORTCODE [heure]
// https://developer.wordpress.org/reference/functions/add_shortcode/
// LE PREMIER PARAMETRE EST LA BALISE POUR UTILISER LE SHORTCODE
add_shortcode( 'heure', 'heure_func' );

```

## THEME STARTER

    BASE DE CODE D'UN THEME
    DANS LEQUEL ON AJOUTE NOTRE CODE DIRECTEMENT DANS LE THEME STARTER...
    (ON NE CREE PAS DE THEME ENFANT...)

    * THEME STARTER DES DEV DE THEME WORDPRESS
    https://underscores.me/

    * AUTRES INITIATIVES INTERESSANTES
    https://www.wpbeginner.com/wp-themes/21-best-wordpress-starter-themes-for-developers/

## THEMES ENFANTS

    ON UTILISE UN THEME DEJA CODE (THEME PARENT)
    ET ON LE COMPLETE/MODIFIE EN AJOUTANT NOTRE CODE DANS UN THEME ENFANT

    PAUSE JUSQU'A 13H40...

    













    
