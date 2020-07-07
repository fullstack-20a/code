# JOUR 20

## LIVESHARE

https://prod.liveshare.vsengsaas.visualstudio.com/join?AD6E29E69E22C5E20E6803DD9EFB5F05EE97

## NEWS / QUESTIONS


## THEME ET TRADUCTIONS

    IL Y A DEJA DES MECANISMES DE FILTRES POUR TRADUIRE LES TEXTES
    __          RENVOIE LE TEXTE TRADUIT
    _e          AFFICHE LE TEXTE TRADUIT

    https://developer.wordpress.org/themes/functionality/internationalization/

    LES FICHIERS DE TEXTES TRADUITS SONT GERES A PART...
    .po     FICHIERS TEXTES DE TRADUCTION
    .mo     FICHIERS BINAIRES PRODUITS A PARTIR DES .po

## THEME ET EXTENSIONS

    UN THEME ASSEZ BASIQUE PEUT FONCTIONNER AVEC LA PLUPART DES EXTENSIONS
    ET GUTENBERG PERMET AUSSI DE COMPOSER LA MISE EN PAGE FACILEMENT

    => UN THEME PEUT RESTER ASSEZ SIMPLE ET ETRE COMPLETE PAR DES EXTENSIONS
    => TENDANCE AVEC GUTENBERG: LES THEMES SE SIMPLIFIENT POUR DEVENIR DES CONTAINERS POUR GUTENBERG


    DANS LES FONCTIONS WORDPRESS
    wp_head
    wp_footer
    the_content
    ...
    PERMETTENT AUX EXTENSIONS DE RAJOUTER LEUR CODE HTML, CSS, JS, etc...


## THEMES ET ARTICLES

    ON VA CREER 9 ARTICLES ET LES RANGER DANS 3 CATEGORIES
    vie sauvage
    ferme
    domestique


## IMAGE MISE EN AVANT

    ON VA POUVOIR AJOUTER, EN PLUS DU TITRE ET DU CONTENU, UNE IMAGE MISE EN AVANT
    
    https://developer.wordpress.org/reference/functions/add_theme_support/

    https://developer.wordpress.org/reference/functions/the_post_thumbnail/

    DANS LE FICHIER functions.php

```php
    // ON VEUT POUVOIR ASSOCIER AUX ARTICLES UNE IMAGE MISE EN AVANT
    add_theme_support( 'post-thumbnails' );
```

    ET ENSUITE DANS LE CODE DES TEMPLATES, DANS LA BOUCLE

```php
            <div><?php the_post_thumbnail() ?></div>
```

```php
<?php while ( have_posts() ) : the_post(); ?>
    <article>
        <h2><?php the_title() ?></h2>
        <div><?php the_content() ?></div>
        <div><?php the_post_thumbnail() ?></div>
    </article>
<?php endwhile; ?>
```

    PAUSE JUSQU'A 11H...


