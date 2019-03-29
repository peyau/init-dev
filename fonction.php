<?php

function F_MaFonction($nom, $prenom) // Déclaration des variables à l'intérieur des ()
{
  echo "Salut $nom $prenom <br>";
}

F_MaFonction('Levaux', 'Jonathan'); // Appel de la fonction avec la valeur des variables définies dans la fonction

// -----------------------------------------------------------------------------
function F_Addition($nb1, $nb2)
{
  $resultat = $nb1+$nb2;
  echo "$nb1 + $nb2 = $resultat <br>";
}

F_Addition(1, 4);

// -----------------------------------------------------------------------------
function F_Addition2($nb1, $nb2)
{
  echo $nb1 . ' + ' .  $nb2 . ' = ' . ($nb1+$nb2) . '<br>'; // Mettre des parenthèses pour effectuer le calcul
}

// Fonction Addition
F_Addition2(2, 6);

// -----------------------------------------------------------------------------
function F_Calcul($nb1, $nb2, $operateur)
{
  if ($operateur=="+")
  {
    echo $nb1 . ' ' . $operateur . ' ' . $nb2 . ' = ' . ($nb1 + $nb2) . '<br>';
  }
  elseif ($operateur=="-")
  {
    echo $nb1 . ' ' . $operateur . ' ' . $nb2 . ' = ' . ($nb1 - $nb2) . '<br>';
  }
  elseif ($operateur=="*")
  {
    echo $nb1 . ' ' . $operateur . ' ' . $nb2 . ' = ' . ($nb1 * $nb2) . '<br>';
  }
  elseif ($operateur=="/")
  {
    echo $nb1 . ' ' . $operateur . ' ' . $nb2 . ' = ' . ($nb1 / $nb2) . '<br>';
  }
}
F_Calcul(1,4,"-");

// -----------------------------------------------------------------------------
function F_Calcul2(int $nb1, int $nb2, string $operateur='+') // Typage des paramètres pour les variables, pour forcer l'utilisation de ce type (int pour forcer à utiliser un entier, ...)
// le $operateur='+' permet de lui donner cette valeur par défaut et il ne faut pas préciser ce paramètre dans l'appel de la fonction du coup
{
  switch ($operateur)
  {
    case '+':
      echo $nb1 . ' ' . $operateur . ' ' . $nb2 . ' = ' . ($nb1 + $nb2) . '<br>';
      break;
    case '-':
      echo $nb1 . ' ' . $operateur . ' ' . $nb2 . ' = ' . ($nb1 - $nb2) . '<br>';
      break;
    case '*':
      echo $nb1 . ' ' . $operateur . ' ' . $nb2 . ' = ' . ($nb1 * $nb2) . '<br>';
      break;
    case '/':
      echo $nb1 . ' ' . $operateur . ' ' . $nb2 . ' = ' . ($nb1 / $nb2) . '<br>';
      break;
  }
}
F_Calcul2(2,5);

// -----------------------------------------------------------------------------
function F_Decoupe ($chaine)
{
  echo wordwrap($chaine, 2, " ", true) . '<br>'; // Découper une chaine tous les 2 caractères
}

F_Decoupe("Voiturerouge");

// -----------------------------------------------------------------------------
function F_Nom(string $nom, string $prenom='-')
{
  echo 'Bonjour ' . $nom . ' ' . $prenom . '<br>';
}

F_Nom('Levaux');

// -----------------------------------------------------------------------------
function F_Nom2(string $nom, string $prenom='-')
{
  return 'Bonjour ' . $nom . ' ' . $prenom . '<br>'; // Permet de stocker un retour dans un variable
}

$valeur = F_Nom2('Jonathan');
echo $valeur; // Vu qu'on a fait un return dans la fonction, il faut faire un echo de la fonction pour l'afficher

// -----------------------------------------------------------------------------
function rien()
{
  return 'test'; // Permet de retourner le résultat
}

$test = rien(); // On met ça dans une variable
var_dump($test); // On afficher ce qui a été retourné

// -----------------------------------------------------------------------------
function F_concatenation($chaine1, $chaine2)
{
  return $chaine1 . ' ' . $chaine2;
}

$chaine = F_concatenation("Je suis la premiere chaine.", "Je suis la deuxieme chaine <br>");
echo $chaine;

// -----------------------------------------------------------------------------
function F_melange($mot1, $mot2)
{
  $i = 0; // Le compteur est à 0
  if($mot1>$mot2 or $mot1==$mot2) // Si le mot 1 est plus grand que le mot 2 ou est égal alors
  {
    while($i<strlen($mot1)) // Le temps qu'on n'a pas terminé la taille du mot
    {
      echo substr($mot1, $i, 1) . substr($mot2, $i, 1); // Récupérer le caractère 1(+incrément) du mot 1 et le caractère 1(+incrément) du mot 2
      $i++; // Incrémentation
    }
  }

  elseif($mot2>$mot1) // Si le mot 2 est plus grand que le mot 1 alors
  {
    while($i<strlen($mot2)) // Le temps qu'on n'a pas terminé la taille du mot
    {
      echo substr($mot1, $i, 1) . substr($mot2, $i, 1); // Récupérer le caractère 1(+incrément) du mot 1 et le caractère 1(+incrément) du mot 2
      $i++; // Incrémentation
    }
  }
}

F_melange("", ""); // Appel de la fonction avec les variables dedans

// -----------------------------------------------------------------------------
function F_melange2($mot1, $mot2)
{
  $i=0;
  while($i<strlen($mot1)) // Tant que le compteur est inférieur à la taille du mot
  {
    echo $mot1[$i] . $mot2[$i]; // Dans le tableau de la chaîne, 0 correspond au 1er caractère, etc...
    $i++;
  }
}

F_melange2('AAAAA', 'BBBBB');
echo '<br>';

// -----------------------------------------------------------------------------
// Modifier une variable en dehors de sa Fonction
$nom='claude'; // Déclaration de la variable
function F_changement(&$nom) // Passer une variable en référence (permet d'utiliser la variable qui a été créée avant, au lieu d'en créer une nouvelle)
{
  $nom = ucfirst($nom); // On tranforme la chaine nom en 'ucfirst...' pour mettre le premier caractère de la chaîne en majuscule
}
F_changement($nom); // On appelle la fonction
echo $nom; // On affiche la variable
