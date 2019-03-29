<?php

/*
******************************
*      Les tableaux php      *
******************************
*/

$metiers = ["infirmier", "plombier"]; // Tableau metiers
$enfants = array("David", "Samuel", "Valentin"); // Tableau enfants

$enfants[] = "Jonathan"; // Permet d'ajouter un élément dans le tableau
// Si on met une valeur entre les crochets (qui correspond déjà à un numéro dans le tableau), celui-ci sera remplacé

array_push($enfants, "Véronique", "Andrew"); // Autre manière pour ajouter des éléments dans un tableau

$tableau = [
'ville' => 'Mouscron',
'ecole' => "IEPSM",
'entier' => 15,
'float' => 10.22,
'booleen' => true,
10 => 'entier'
];


echo "<pre>"; // Permet d'avoir un affichage structuré des tableaux
print_r($metiers); // Affichage du tableau avec print_r()
print_r($enfants);
var_dump($tableau);

$taille = count($tableau);

echo "Taille du tableau: " . $taille; // Permet d'afficher la taille du tableau

// -----------------------------------------------------------------------------
