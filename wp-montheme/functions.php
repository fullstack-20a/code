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
