<?php
// Créer un tableau

/*
$tableau = array();
$tableau = [];
*/

// Ajouter un élément dans un tableau
/*
$tableau[1]='Voiture'; Créer l'élément au niveau 1
$tableau[]='Voiture'; Créer l'élément au niveau 0 et positionne lui-même les éléments dans le tableau
array_push($tableau, 'Voiture');
*/

/*
$tableau = [];
$tableau[1] = 'Voiture';
$tableau[] = 'Maison';
$tableau['Enfant'] = 'Clément';
array_push($tableau, 'porte');


echo '<pre>';
print_r($tableau);
*/

/*
$prenoms = ['Roger', 'Andrew', 'Hervé', 'Patrice', 'Françoise'];

echo '<pre>';
echo $prenoms[0] . '<br>';
echo $prenoms[1] . '<br>';
echo $prenoms[2]. '<br>';
echo $prenoms[3]. '<br>';
echo $prenoms[4]. '<br>';

echo print_r($prenoms);
*/
/*
$personne = [
  'nom' => 'Roger',
  'prenom' => 'Bernard',
  'age' => '20 ans',
  'civilité' => 'Belge',
  'adresse' => 'Rue de la pomme N°11'
];

echo $personne['nom'] . ' ' . $personne['prenom'] . ' ' .  $personne['age'] . ' ' .  $personne['civilité'] . ' ' .  $personne['adresse'];
*/


/*
$personne2 = [
  'nom' => 'Roger',
  'prenom' => 'Bernard',
  'adresse' => [
  'rue' => 'rue de la vie',
  'numero' => '18',
  'code_postal' => '7700'
 ]
];
/*
echo $personne2 ['nom'] . '<br>';
echo $personne2 ['prenom'] . '<br>';
echo $personne2 ['adresse']['rue'] . '<br>';
echo $personne2 ['adresse']['numero'] . '<br>';
echo $personne2 ['adresse']['code_postal'] . '<br>';
*/

/*
$prenoms2 = ['Oleko', 'Olivier', 'Floriant', 'Johan', 'Mouadh'];

for ($i=0;$i<count($prenoms2);$i++)
{
  echo $prenoms2[$i] . '<br>';
}
*/

/*
$personne2 = [
  'nom' => 'Roger',
  'prenom' => 'Bernard',
  'rue' => 'rue de la vie',
  'numero' => '18',
  'code_postal' => '7700'
];
foreach($personne2 as $key => $value)
{
  echo $key . ' '. $value . '<br>';
}
*/

/*
Faire pareil qu'au-dessus mais sans utiliser la variable $value dans l'echo
$personne2 = [
  'nom' => 'Roger',
  'prenom' => 'Bernard',
  'rue' => 'rue de la vie',
  'numero' => '18',
  'code_postal' => '7700'
];
foreach($personne2 as $key => $value)
{
  echo $personne2[$key] . '<br>';
}
