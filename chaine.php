<?php

$prenom = 'Thomas';

echo 'On met la première lettre en majuscule : ' . ucfirst($prenom) . '<BR>'; // Fonction pour mettre la première lettre du mot en majuscule

echo 'On met le mot en entier en majuscules : ' . strtoupper($prenom) . '<BR>'; // Fonction pour mettre toutes les lettres du mot en majuscule

$prenomMaj=strtoupper($prenom); // On place le mot en majuscule dans une variable

echo 'Le nom en majuscule avec la nouvelle variable : ' . $prenomMaj . '<BR>';
echo 'On met la nouvelle variable en minuscule : ' . strtolower($prenomMaj) . '<BR>'; // Fonction pour mettre toutes les lettres du mot en minuscule

echo 'Le mot fait ' . strlen($prenom) . ' lettres' . '<BR>' . '<BR>'; // Fonction qui permet de compter le nombre de caractères dans une variable

// -----------------------------------------------------------------------------
$texte = ' Portes ouvertes l\'école au travail ';

// Supprimer le premier espace de la chaîne
// echo substr($texte, 1) . '<BR>'; // Ne supprime que le premier caractère
echo ltrim($texte) . '<BR>';
// Supprimer l'espace de la fin de la chaîne
// echo substr($texte, 0, -1) . '<BR>'; // Ne supprime que le dernier caractère
echo rtrim($texte) . '<BR>';
// Supprimer les espaces de début et de fin de la chaîne
echo trim($texte) . '<BR>';
// Supprimer tous les espaces de la chaîne
echo str_replace(' ', '', $texte) . '<BR>'; // Fonction qui permet de remplacer ' ' par '' dans la variable $texte, c'est possible de modifier ça évidemment

var_dump (explode(' ', $texte)); // Afficher dans un tableau chaque mot séparé par un espace dans la variable $texte

echo number_format (10000000, 2, ",", " "); // Permet de formater un nombre (ajouter des décimales, espaces, ...)
// Les valeurs entre les parenthèses: le nombre, le nombre de décimales, le séparateur de décimales, le séparateur des milliers
