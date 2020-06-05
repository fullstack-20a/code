<?php

echo "<h3>foreach avec indice</h3>";
$tabOrdonne = [ "a", "b", "c", "d" ];

foreach($tabOrdonne as $index => $valeur)
{
    echo "<h4>$index / $valeur</h4>";
}

echo "<h3>foreach sans indice</h3>";
$tabOrdonne = [ "a", "b", "c", "d" ];

foreach($tabOrdonne as $valeur)
{
    echo "<h4>$valeur</h4>";
}

echo "<h3>foreach sur tableau associatif</h3>";

$tabAsso = [ "cle1" => "valeur1", "cle2" => "valeur2", "cle3" => "valeur3" ];
foreach($tabAsso as $cle => $valeur)
{
    echo "<h4>$cle / $valeur</h4>";   
}

echo "<h3>foreach sur tableau associatif sans les clés</h3>";

$tabAsso = [ "cle1" => "valeur1", "cle2" => "valeur2", "cle3" => "valeur3" ];
foreach($tabAsso as $valeur)
{
    echo "<h4>$valeur</h4>";   
}

echo "<h3>foreach sur tableau associatif sans les clés avec break</h3>";

$tabAsso = [ "cle1" => "valeur1", "cle2" => "valeur2", "cle3" => "valeur3" ];
$search  = "valeur2";
foreach($tabAsso as $valeur)
{
    // SI ON TROUVE LA VALEUR CHERCHEE ALORS ON ARRETE LA BOUCLE
    echo "<h4>$valeur</h4>"; 
    if ($valeur == $search)
    {
        // ON SORT DE LA BOUCLE AVANT LA FIN
        break;
    }  
}

echo "<h3>for pour compter</h3>";

$max = 10;
// avec un tableau
// $max = count($tableau)
for($compteur=0; $compteur<$max; $compteur++)
{
    echo "($compteur)";
}

echo "<h3>for pour parcourir un tableau ordonné</h3>";

$tabOrdonne = [ "a", "b", "c", "d" ];
// 0 POUR COMMENCER A L'INDICE DU PREMIER ELEMENT
// INDICE DU DERNIER ELEMENT count($tabOrdonne) -1
// => ASTUCE AVEC < ON VA S'ARRETER UN CRAN AVANT
for($compteur=0; $compteur < count($tabOrdonne); $compteur++)
{
    $element = $tabOrdonne[$compteur];
    echo "($compteur/$element)";
}


echo "<h3>while pour parcourir un tableau ordonné</h3>";
$tabOrdonne = [ "a", "b", "c", "d" ];

$compteur=0;
while ($compteur < count($tabOrdonne))
{
    $element = $tabOrdonne[$compteur];
    echo "($compteur/$element)";
    // ATTENTION NE PAS OUBLIER LE COMPTEUR A INCREMENTER
    $compteur++;
}