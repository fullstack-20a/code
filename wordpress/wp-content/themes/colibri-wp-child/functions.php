<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(  ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_separate', trailingslashit( get_stylesheet_directory_uri() ) . 'ctc-style.css', array( 'chld_thm_cfg_parent' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

// END ENQUEUE PARENT ACTION


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


// [tableau nbligne="2" nbcolonne="3"]
function tableau_callback ($tabAssoAttribut)
{
    // ON PEUT RECUPERER LES VALEURS DES ATTRIBUTS DU SHORTCODE 
    // AVEC LE TABLEAU ASSOCIATIF FOURNI EN PARAMETRE
    $nbligne   = $tabAssoAttribut["nbligne"] ?? 1;
    $nbcolonne = $tabAssoAttribut["nbcolonne"] ?? 1;

    return "(ON A DEMANDE UN TABLEAU AVEC $nbligne x $nbcolonne)";
}

add_shortcode( 'tableau', 'tableau_callback' );
