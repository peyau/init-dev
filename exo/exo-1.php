<?php
$marqueVoiture = [
  'audi',
  'bmw',
  'citroen',
  'peugeot',
  'volkswagen',
];


for ($i=0;$i<count($marqueVoiture);$i++)
{
echo strtoupper($marqueVoiture[$i]) . '<br>';
}

// -----------------------------------------------------------------------------
echo '<br>';

for ($i=count($marqueVoiture)-1;$i>-1;$i--)
{
echo $marqueVoiture[$i] . '<br>';
}

// -----------------------------------------------------------------------------
echo '<br>';
$i=0;
while ($i<count($marqueVoiture)){
  echo strtoupper($marqueVoiture[$i++]) . '<br>';
}
// ou pour la décrémentation en 4 lignes
echo '<br>';
$i=count($marqueVoiture);
while ($i-- >0){
  echo strtoupper($marqueVoiture[$i]) . '<br>';
}

// -----------------------------------------------------------------------------
/*
echo '<br>';
 srand((float)microtime()*1000000);
 shuffle($marqueVoiture);

 $nbcol = 2;  // mettez le nombre de colonnes dont vous avez besoin

  $nb=count($marqueVoiture);
  for($i=0;$i<$nb;$i++)
  {
  //les valeurs à afficher
  $valeur1=$marqueVoiture[$i];
  if($i%$nbcol==0)
   echo '<tr>';
    echo '<td>',$valeur1,'</td>' . '<br>';
  if($i%$nbcol==($nbcol-1))
   echo '</tr>';
  }
  echo '</table>';

 function melange($array) {
  shuffle($array);
     foreach($keys as $key) $val[] = $array[$key];
       return $val;
     }
*/
//------------------------------------------------------------------------------
echo '<br>';
print_r(explode(', ', implode($marqueVoiture, ', '))); // Implode permet de passer un tableau en chaîne de caractères. Explode lui permet de faire l'inverse, mais il faut utiliser un print_r
/* En fait ça, c'est bizarre, on fait un implode pour refaire un explode, c'est pas normal de faire ça, c'est soit l'un, soit l'autre.
 On peut par exemple faire un explode d'une phrase où il y a des espaces, pour récupérer tous les mots séparés par des espaces*/
//------------------------------------------------------------------------------
echo '<br>';
echo '<br>';

for ($i=0;$i<count($marqueVoiture);$i++)
{
echo $marqueVoiture[$i] . ' ' . strlen($marqueVoiture[$i]) . ' caractère(s)' . '<br>';
}

//------------------------------------------------------------------------------
echo '<br>';
  echo 'avec Foreach' . '<br>';
foreach($marqueVoiture as $key => $valeur)
{
  echo $key . ' ' . $marqueVoiture[$key] . '<br>';
}
//------------------------------------------------------------------------------
