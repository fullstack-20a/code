<?php
/*

Template Name: MON TEMPLATE POUR LA GALERIE

=> ANNOTATION: 
    ASTUCE DES FRAMEWORKS... 
    COMMENTAIRE POUR PHP
    MAIS CODE ACTIF POUR WORDPRESS

*/

// AVEC WORDPRESS
get_header();

get_template_part("template-parts/section-galerie");    // ATTENTION: SANS .php 
// POUR LE DECOUPAGE ON EST LIBRE DE DECOUPER EN AUTANT DE TRANCHES QUE NECESSAIRE
get_template_part("template-parts/section-index");      // ATTENTION: SANS .php 

get_footer();

