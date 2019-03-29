<?php

// 16/01
// Ex1
function compter(int $nbDepart, int $nbFin) : array { // Déclaration fonction + dire qu'on va retourner le résultat dans un tableau
  $tableau=[]; // Déclaration d'un tableau dans lequel on va mettre les informations
  //$tab = array();
  for ($nbDepart; $nbDepart <= $nbFin;$nbDepart++) { // For
    array_push($tableau, $nbDepart); // Ajouter le nombre dans le tableau
    }
    array_push($tableau, 'end'); // afficher quelque chose à la fin du tableau pour dire que c'est terminé
  return $tableau;
}

echo implode(', ',compter(0,-1));

/*$tableau2=compter(1,5);
foreach($tableau2 as $key => $value)
{
  echo $tableau2[$key] . '<br>';
}*/

echo '<br>';
echo '<br>';
//------------------------------------------------------------------------------
// Ex2
function triangle(int $a, int $b)  {
    return sqrt(pow($a, 2)+pow($b, 2)); // sqrt permet de faire une racine carrée. Pow permet d'élever une valeur à un exposant
}
echo triangle(5,10);

echo '<br>';
echo '<br>';
// -----------------------------------------------------------------------------
// Ex 1 du 30/01
$nom = [
  'Toto',
  'Roger',
  'Maurice',
  'David',
  'Veronique',
  'Toto',
  'René',
  'Roger'
];

$nom2 = [];

foreach($nom as $key => $value){
    if(in_array($value,$nom2)==0){ // Si l'élément n'existe pas dans le tableau, on l'ajoute
        array_push($nom2, $value); // Ajoue de l'élément dans le tableau
        echo $value . '<br>';
    }
  }

echo '<br>';
// Ex 2 du 30/01
$fruit = [
      'Banane',
      'Pomme',
      'Poire',
      'Cerise',
      'Fraise',
      'Framboise'
    ];

foreach($fruit as $key => $value){
  if (strpos($value,'o',0)!==false){  // Si la chaîne dans $valeur contient la lettre o à partir du caractère 0... !== permet d'éviter les erreurs si la valeur se trouve à la position 0
    echo $value . '<br>';
  }
}
