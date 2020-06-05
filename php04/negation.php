<?php

$nombre = 7;

// CONVERSION AUTOMATIQUE DE NOMBRE EN BOOLEEN
// 7        => true
// negation => false
$negation = ! $nombre;

var_dump($negation);

// CONVERSION AUTOMATIQUE DE NOMBRE EN BOOLEEN
// 0 => false
$nombre2 = 0;
// negation false => true
$negation2 = ! $nombre2;

var_dump($negation2);


$nombre = 10;
$texte = "10";

$res8 = ($nombre == $texte);     // $res8 = true     CAR LES VALEURS CONVERTIES SONT LES MEMES
var_dump($res8);
$res9 = ($nombre === $texte);    // $res8 = false   CAR LES TYPES SONT DIFFERENTS  
var_dump($res9);




