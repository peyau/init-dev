<?php

/*
******************************
*        Les bases php       *
******************************
*/

/*
Les différents types de variables:
string    ->  Pour les chaînes de caractère
int       ->  Pour les nombres entiers
booleen   ->  Pour les "vrai ou faux"
float     ->  Pour les nombres à virgule
*/

 // Permet d'afficher print_r plus clairement (sous forme de tableau)
echo '<pre>';

$prenom = 'Jonathan';

$int1 = 1234;
$int2 = -123;
$int3 = 0123; // Décimal
$int4 = 0x1A; // Hexadécimal
$int5 = 0b11111111; // Binaire

$bool1 = true; // Variable booléenne
$bool2 = false; // Varialbe booléenne

// Des variables qui font des calculs...
$addition = 5+5;
$soustraction = 5-2;
$division = 15/3;
$modulo = 15%6;

// echo = print
// Première manière d'utiliser une variable

print "Bonjour je m'appelle $prenom <br>"; // <br> est utilisable de cette manière car il est entre guillemets (double)

// Deuxième manière

echo 'Mon nom est '.$prenom;
echo '<br>';

// Troisième manière

echo 'Bonjour je m\'appelle '.$prenom.'<br>'; // Ici il y a une concaténation du BR

echo $int1.' '.$int2.' '.$int3.' '.$int4.' '.$int5.'<br>';

// Fonction à utiliser pour effecuter des tests et connaîte les détails de la variable entre ()
var_dump($bool1);

/*
pour commenter
plusieurs lignes
*/

echo "$addition <br> $soustraction <br> $division <br> $modulo <br> <br>";

// Opérateurs d'affectation
$nombre = 1000;
$nombre += 5; // Permet d'ajouter 5 à la variable "nombre". C'est comme faire $nombre = $nombre + 5;
$nombre -= 3; // Même principe pour les lignes suivantes
$nombre *= 2;
$nombre /= 4;
$nombre %= 1;

echo $nombre . '<br>' . '<br>';

$text = 'hello';
$text .= ' world' . '<br>' . '<br>'; // Pour ajouter du texte à une variable
echo $text;

// Les conditions
$age = 18;

if ($age >= 18)
  {
    if ($age > 50)
      {
        echo 'ça commence a faire de l\'âge';
      }
    else if ($age > 18)
      {
        echo 'vous êtes majeur';
      }
    else if ($age == 18)
      {
          echo 'vous êtes juste majeur';
      }
  }
  else
  {
    echo 'vous êtes mineur';
  }
echo '<br>' . '<br>';

// Comparaison booléen
$autorisation = false;
if($autorisation == true) // Possible de mettre if($autorisation) uniquement car la variable est du booléen et ne nécessite pas forcément d'indicateur de comparaison dans la condition
  {
    echo 'vous pouvez rentrer';
  }
  else
  {
    echo 'vous ne pouvez pas rentrer';
  }

echo '<br>' . '<br>';

// Opérateurs logiques dans les conditions
$genre = 'homme';
$sonage = 18;
if ($genre=='homme' and $sonage>=18)
  {
    echo "C'est un $genre et il a $sonage ans";
  }
  else if ($genre=='homme' and $sonage<18)
  {
    echo 'C\'est un homme mais il n\'a pas 18 ans';
  }
  else if ($genre!='homme')
  {
    echo 'Ce n\'est pas un homme';
  }
var_dump($genre=='homme' and $sonage>=18); // Tester le type de la condition
echo '<br>' . '<br>';

// L'utilisation du switch
$point=2;

switch($point){
  case 1:
    echo 'très très mauvais';
  break;
  case 2:
    echo 'mauvais';
  break;
  case 3:
    echo 'bien';
  break;
  default: // Si on veut ajouter une valeur par défaut (si $point ne correspond à aucun 'case' par exemple)
    echo 'aucun point';
}
