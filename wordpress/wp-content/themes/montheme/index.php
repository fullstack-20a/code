<?php

// EN PHP
// RECOMPOSER LE TEMPLATE AVEC LES 3 TRANCHES
// require_once "header.php";
// require_once "section-index.php";
// require_once "footer.php";

// AVEC WORDPRESS
get_header();
get_template_part("template-parts/section-index"); // ATTENTION: SANS .php 
get_footer();
