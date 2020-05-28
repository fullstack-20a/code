<?php 

// ON PEUT ECRIRE PLUSIEURS LIGNES D'INSTRUCTIONS
// => IL FAUT LES SEPARER AVEC ;

// JE PEUX DONNER UN TITRE POUR LA PAGE D'ACCUEIL
$h1         = "TITRE DE MA PAGE D'ACCUEIL";
$classBody  = "accueil";
$entreprise = "Apple";

// DANS header.php ON VA UTILISER LA VARIABLE $h1
require_once "php/view/header.php";
require_once "php/view/section-index.php";
require_once "php/view/footer.php";

?>