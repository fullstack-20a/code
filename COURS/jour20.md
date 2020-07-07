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

## AJOUT DU PERMALIEN VERS LA PAGE DE L'ARTICLE TOUT SEUL

    https://developer.wordpress.org/reference/functions/the_permalink/

```php
        <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
```


## BOUCLES MULTIPLES


    https://codex.wordpress.org/The_Loop#Multiple_Loops

    2 POSSIBILITES
    * EN FONCTIONNEL
    * ET EN POO


    https://developer.wordpress.org/reference/classes/wp_query/


    TRES UTILISE POUR COMPOSER UNE PAGE AVEC PLUSIEURS ARTICLES
    SEPARES EN DIFFERENTES CATEGORIES
    => SITE MAGAZINES / ACTUS

```php

<?php $my_query = new WP_Query( 'category_name=vie-sauvage&posts_per_page=10' ); ?>

    <div class="row x3col">
<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
    <article>
        <div class="photo"><?php the_post_thumbnail() ?></div>
        <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
        <div><?php the_content() ?></div>
    </article>
<?php endwhile; ?>
    </div>

```

## CHAMPS PERSONNALISES DANS WORDPRESS

    POUR AFFICHER CETTE FONCTIONNALITE
    ALLER DANS L'ECRAN POUR MODIFIER UN ARTICLE
    CLIQUER SUR ... (EN HAUT A DROITE)
    ENSUITE CLIQUER SUR 'options' (EN BAS A DROITE)
    ET ENSUITE COCHER LA CASE 'Champs Personnalisés' (EN BAS DE LA LISTE...)
    ET RECHARGER LA PAGE...
    => ON DOIT AVOIR UN NOUVEAU TIROIR QUI SE RAJOUTE EN BAS DE L'ECRAN
    => ON PEUT ENRICHIR L'ARTICLE AVEC PLUS D'INFOS
            SOUS LA FORME DE CLE ET VALEUR

    https://developer.wordpress.org/reference/functions/post_custom/

    SECRET DE LA FLEXIBILITE DE WORDPRESS 
    POUR CREER DES SITES SUR DES THEMATIQUES TRES VARIES...

## EXTENSION ACF POUR ENRICHIR LES INFOS SUR LES ARTICLES

    Advanced
    Custom 
    Fields

    * VERSION GRATUITE
    https://fr.wordpress.org/plugins/advanced-custom-fields/


    * VERSION PRO (PAYANTE...) 
    https://www.advancedcustomfields.com/


    POUR AFFCIHER LES INFOS, 
    ON PEUT UTILISER LA FONCTION the_field FOURNIE PAR ACF

        <h3>pays d'origine: <?php echo post_custom('pays')?></h3>
        <h3>pays d'origine (ACF): <?php the_field('pays')?></h3>


    PAUSE DEJEUNER JUSQU'A 13H40

## RESUME SUR LA CREATION DE THEME AVEC WORDPRESS


    PAGES ET TEMPLATES DE PAGE      => COOL POUR CREER UN SITE VITRINE
    ARTICLES                        => COOL POUR CREER UN BLOG
    BOUCLES MULTIPLES = COMPOSER UNE PAGE AVEC DES ARTICLES SEPARES SUIVANT LEUR CATEGORIE
                                    => COOL POUR CREER UN SITE MAGAZINE
    CHAMPS PERSONNALISES + ACF      => COOL POUR CREER TOUS LES SITES QU'ON VEUT

    POINTS FORTS DE WORDPRESS
    * SIMPLE A PRENDRE EN MAIN POUR DEMARRER RAPIDEMENT
    * TRES EVOLUTIF ET FLEXIBLE POUR ALLER VERS DES PROJETS COMPLEXES

    DEVELOPPEUR
    * CREER UN THEME 
    => PERMET DE COMPOSER TOUTES LES FONCTIONNALITES DE WORDPRESS
    => SUPER COMBINAISON POUR REALISER DES PROJETS RAPIDEMENT

## EXERCICE

    CREER 3 ARTICLES DANS LA CATEGORIE domestique
    AJOUTER COMME ACF LE CHAMP PERSONNALISE taille
    ET AFFICHER CES ARTICLES AVEC L'INFO taille 
    DANS UNE SECTION SUR LA PAGE galerie

    AUTONOMIE JUSQU'A 14H30...


## TOUJOURS UN PEU PLUS LOIN... CUSTOM POST TYPES


    DANS WORDPRESS, ON GERE
    * DES PAGES
    * DES ARTICLES
    * DES MEDIA

    MAIS ON PEUT AVOIR DES PROJETS QUI ONT BESOIN DE PLUS DE TYPES DE CONTENUS...
    => ON PEUT CREER DES TYPES DE CONTENUS SUPPLEMENTAIRES
    => CUSTOM POST TYPES

    ON VA UTILISER UNE EXTENSION POUR CREER DES CUSTOM POST TYPES
    https://fr.wordpress.org/plugins/custom-post-type-ui/

    ON PEUT AJOUTER DES CONTENUS SUPPLEMENTAIRES SUIVANT NOS BESOINS...
    => CONTENT MANAGEMENT SYSTEM
    => SANS CODER ON PEUT PARAMETRER LE CMS POUR DISTINGUER TOUS LES CONTENUS A GERER

## THEMES POUR WOOCOMMERCE

    * PLUS DE CODE A AJOUTER...
    https://docs.woocommerce.com/document/woocommerce-theme-developer-handbook/#

    * STOREFRONT
    https://docs.woocommerce.com/documentation/themes/storefront/


    PAUSE JUSQU'A 15H50...
    


