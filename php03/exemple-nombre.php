<?php

$nombre1 = 123;



echo "<h3>modulo 10</h3>";
$reste   = $nombre1 % 10;   // 123 = 12 * 10 + 3
echo $reste;    // RESTE = 3

echo "<h3>modulo 5</h3>";
$reste   = $nombre1 % 5;   // 123 = 24 * 5 + 3
echo $reste;    // RESTE = 3

echo "<h3>modulo 7</h3>";
$reste   = $nombre1 % 7;   // 123 = 17 * 7 + 4
echo $reste;    // RESTE = 4

echo "<h3>modulo 2</h3>";
$reste   = $nombre1 % 2;   // 123 = 61 * 2 + 1
echo $reste;    // RESTE = 1    => IMPAIR

echo "<h3>124 modulo 2</h3>";
$reste   = 124 % 2;   // 123 = 62 * 2 + 0
echo $reste;    // RESTE = 0    => PAIR


echo "<h3>prixTTC</h3>";
$prixHT     = 300;
$tauxTVA    = 20;
$prixTTC    = $prixHT + $tauxTVA / 100 * $prixHT;
// FORMULE FACTORISEE
$prixTTC2   = $prixHT * (1 + $tauxTVA / 100);

echo "(formule1: $prixHT (HT) MAIS $prixTTC euros TTC)";
echo "(formule2: $prixHT (HT) MAIS $prixTTC2 euros TTC)";
