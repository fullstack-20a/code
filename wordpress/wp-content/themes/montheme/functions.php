<?php

// ETAPE1
// ON VA DECLARER A WORDPRESS LE NOMBRE DE ZONES QUI POURRONT AFFICHER DES MENUS

// FONCTION DE CALLBACK
function montheme_menus() {

    // tableau associatif pour définir les zones d'affichage disponibles pour les menus
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


// ON VEUT POUVOIR ASSOCIER AUX ARTICLES UNE IMAGE MISE EN AVANT
add_theme_support( 'post-thumbnails' );


// AJOUTER NOS SHORTCODES
// https://codex.wordpress.org/Shortcode_API

// [heure]
function heure_func ()
{
    // https://www.php.net/manual/fr/function.date-default-timezone-set.php
    // POUR CHANGER LE FUSEAU HORAIRE
    date_default_timezone_set('Europe/Paris');

    // ON RENVOIE COMME RESULTAT LE TEXTE QUI REMPLACE LE SHORTCODE
	return date("H:i:s");
}
// ON AJOUTE LE CALLBACK SUR LE SHORTCODE [heure]
// https://developer.wordpress.org/reference/functions/add_shortcode/
add_shortcode( 'heure', 'heure_func' );

// [nb_visites]
function nb_visites_callback ()
{
    $nbvisite = intval(post_custom('nb_visites'));

    // ON VA INCREMENTER LE CHAMP PERSONNALISE nb_visites DE 1
    // https://developer.wordpress.org/reference/functions/update_post_meta/
    update_post_meta(get_the_ID(), 'nb_visites', $nbvisite+1);

    return "<h4>$nbvisite visites sur cette page</h4>";
}
add_shortcode( 'nb_visites', 'nb_visites_callback' );

