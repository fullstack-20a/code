# JOUR 19

## LIVESHARE

https://prod.liveshare.vsengsaas.visualstudio.com/join?289F51A6D56445BC6A7D18F82C9F791F2AE0

## NEWS / QUESTIONS

## WORDPRESS

    https://wordpress.org/

    CMS
    Content
    Management
    System

    Système de Gestion de Contenu

    CMS
        FRAMEWORK
        + BACK-OFFICE

## TELECHARGEMENT

    EN ANGLAIS (CHOIX DE LA LANGUE PENDANT L'INSTALLATION...)
    https://wordpress.org/download/

    EN FRANCAIS
    https://fr.wordpress.org/download/


    DEZIPPER LE DOSSIER wordpress
    (QUI CONTIENT LES FICHIERS .php)
    ET LE COPIER A COTE DES AUTRES DOSSIERS php01/

    (AU BESOIN SUR LINUX, etc... DONNER LES DROITS D'ECRITURE SUR LES FICHIERS ET SOUS-DOSSIERS...)

    DANS LE NAVIGATEUR ALLER SUR LE DOSSIER wordpress/
    (CHEZ MOI...)
    http://localhost/wf3/wordpress/


    CREER LA DATABASE wordpress DANS PHPMYADMIN...

    ENTRER LES INFOS DE CONNEXION A LA BASE DE DONNEES...

    ENTRER LES INFOS DE CREATION DE COMPTE ADMIN...
    long-hai
    )ifYGe5DppP*0xeDu*

    ON A FINI L'INSTALLATION DE WORDPRESS ;-p



    METTRE A JOUR LES EXTENSIONS, THEMES ET TRADUCTION...
    SI BESOIN...
    https://codex.wordpress.org/fr:Modifier_wp-config.php

    // POUR CORRIGER PB DE MISE A JOUR...
    // https://codex.wordpress.org/fr:Modifier_wp-config.php
    define('FS_METHOD', 'direct');


    RESUME
    * INSTALLATION A CREE LE FICHIER wp-config.php
        => INFOS DE CONNEXION ET AUTRES PARAMETRES
    * CREATION LES 12 TABLES SQL...

    PAUSE JUSQU'A 10H55...


## SITE VITRINE

    2 VOYAGES
    1 BONBONS
    1 PHOTOS
    => 3 ANIMAUX
    1 VOITURES

    Accueil
    Galerie
    Blog
    Contact

    CREER LE MENU ET LES PAGES
    ET ENSUITE AJOUTER UN PEU DE TEXTE DANS LES PAGES accueil, galerie et contact
        (la page blog est utilisé par WordPress pour afficher les articles...)


## CREER SON THEME AVEC WORDPRESS

    WORDPRESS COMME FRAMEWORK... POUR LES DEVELOPPEURS...

    DOSSIERS DE WORDPRESS:

    LA PARTIE ADMIN EST DANS LE DOSSIER wp-admin/
    http://localhost/wf3/wordpress/wp-admin/

    LE CODE DU FRAMEWORK EST DANS LE DOSSIER wp-includes/
    
    => NE JAMAIS MODIFIER LE CODE DE CES 2 DOSSIERS 
        wp-admin/
        wp-includes/

        (LES MISES A JOUR ECRASENT CES 2 DOSSIERS...)

    POUR NOUS:
    * WORDPRESS RESERVE LE DOSSIER wp-content/  
    * ET IL Y A LE FICHIER DE CONF wp-config.php

    (TOUT LE RESTE EST IDENTIQUE QUELQUE SOIT LE SITE WORDPRESS...)

    LE CODE DES THEMES DE WORDPRESS EST DANS LE DOSSIER
    wp-content/themes/

    ON A UN DOSSIER PAR THEME INSTALLE POUR NOTRE SITE...

    POUR CREER NOTRE THEME, ON VA AJOUTER UN NOUVEAU DOSSIER
    wp-content/themes/montheme/

    => DANS LA PARTIE ADMIN WORDPRESS DETECTE LE DOSSIER MAIS LE THEME EST INCOMPLET
    http://localhost/wf3/wordpress/wp-admin/themes.php

    => AJOUTER LE FICHIER style.css

    wp-content/themes/montheme/style.css

    => AJOUTER LE FICHIER index.php

    wp-content/themes/montheme/index.php

    BRAVO 
    => VOUS AVEZ CREE UN THEME POUR WORDPRESS
    ON PEUT ACTIVER LE THEME
    => SUR LA PARTIE PUBLIQUE, ON A UNE BELLE PAGE VIDE

    => C'EST TRES SIMPLE DE CREER UN THEME POUR WORDPRESS ;-p

    ON PEUT AJOUTER NOTRE CODE HTML DANS index.php
    => WORDPRESS UTILISE CE CODE POUR AFFICHER LA PAGE AUX VISITEURS
    => COOL, LE THEME A VRAIMENT LE CONTROLE SUR LE CODE HTML ;-p



## AJOUTER LE BANDEAU NOIR 

    IL FAUT AJOUTER DANS NOTRE CODE index.php
    DES APPELS A DES FONCTIONS DE WORDPRESS
    wp_head         A AJOUTER AVANT </head>
    wp_footer       A AJOUTER AVANT </body>

    https://developer.wordpress.org/reference/functions/wp_head/
    https://developer.wordpress.org/reference/functions/wp_footer/


    => PERMET A WORDPRESS D'AJOUTER SON CODE CSS, HTML ET JS DANS LA PAGE


## AJOUTER LE CODE POUR RETROUVER LE MENU DE NAVIGATION

    UN PEU PLUS COMPLIQUE...
    EN PLUSIEURS ETAPES...

    CREER LE FICHIER functions.php
        wp-content/themes/montheme/functions.php

    => CE FICHIER SERT A DECLARER NOS PARAMETRES POUR NOTRE THEME 
        (ET AUSSI A DECLARER NOS FONCTIONS)
    => WORDPRESS VA CHARGER LE CODE DE CE FICHIER AUTOMATIQUEMENT 
        AVANT LES AUTRES FICHIERS DE NOTRE THEME


```php
<?php

// ETAPE1
// ON VA DECLARER A WORDPRESS LE NOMBRE DE ZONES QUI POURRONT AFFICHER DES MENUS

// FONCTION DE CALLBACK
function montheme_menus() {

	$locations = [
		'primary'       => 'MON MENU PRINCIPAL',
		'secondary'     => 'MON MENU DANS LE FOOTER',
        'toto3'         => 'MON MENU AILLEURS DANS UN TEMPLATE',
        // ...
    ];

    // ENREGISTRE DANS WORDPRESS LE NOMBRE DE ZONES OU ON POURRA AFFICHER DES MENUS
    // https://developer.wordpress.org/reference/functions/register_nav_menus/
	register_nav_menus( $locations );
}

// WORDPRESS VA AUTOMATIQUEMENT APPELER LA FONCTION DE CALLBACK SUR L'EVENEMENT init
add_action( 'init', 'montheme_menus' );

```


    index.php


```php
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- wp_head DEBUT -->
    <?php wp_head() ?>
    <!-- wp_head FIN -->
    </head>
<body>
    <header>
        <h1>MON SITE WORDPRESS</h1>
        <nav>
            <?php wp_nav_menu([ 'theme_location' => 'primary']) ?>
        </nav>
    </header>
    <main>
        <section>
            <h2>MON TITRE DE SECTION</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus doloremque provident nemo cupiditate est voluptates exercitationem vel eveniet. Deserunt incidunt ducimus nemo. Ipsum provident eaque explicabo ad omnis alias illum.</p>   
        </section>
    </main>
    <footer>
        <p>tous droits réservés</p>
    </footer>

    <!-- wp_footer DEBUT -->
    <?php wp_footer() ?>
    <!-- wp_footer FIN -->
    </body>
</html>
```

    PAUSE DEJEUNER ET ON REPREND A 13H35...

    