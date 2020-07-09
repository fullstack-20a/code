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

