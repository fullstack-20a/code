<?php

$debut      = "Bonjour";
$fin        = "Comment ça va ?";
$aurevoir   = "Au revoir";

// EN PHP   => ON UTILISE .
$texteFinal     = $debut . ", " . $fin . "\n". $aurevoir;

$texteFinal2    = "$debut, $fin\n$aurevoir";

$texteFinal3    = '$debut, $fin\n$aurevoir';

// https://developer.mozilla.org/fr/docs/Web/HTML/Element/pre
echo "<pre>";
echo $texteFinal;
echo "</pre>";

echo "<h3>avec guillemets doubles</h3>";
echo "<pre>";
echo $texteFinal2;
echo "</pre>";

echo "<h3>avec guillemets simples</h3>";
echo "<pre>";
echo $texteFinal3;
echo "</pre>";


echo "<h3>sans heredoc</h3>";
// pénible car on doit ajouter plein de \
$texte0 = "<h3 class=\"titre3\" id=\"montitre\">mon texte 2</h3>";
echo $texte0;

echo "<h3>sans heredoc avec guillemets simples</h3>";
// les variables ne sont pas reconnues
$texte00 = '<h3 class="titre3" id="montitre">$aurevoir</h3>';

echo $texte00;

echo "<h3>avec heredoc</h3>";
$texte = 
<<<CODEHTML

<h3 class="titre3" id="montitre">mon texte 2 $aurevoir</h3>

CODEHTML;

echo $texte;
