<!--
******************************
*         Formulaire2        *
******************************
-->

<?php

?>

<form method="GET" action="cible.php"> <!-- On envoie le formulaire implicitement -->
  Prénom:  <input type="text" value="" name="prenom" placeholder="Indiquez votre prénom"> <!-- placeholder permet de noter quelque chose dans le champ en grisé -->
  <br>
  Nom:  <input type="text" value="" name="nom" placeholder="Indiquez votre nom">
  <br>
  <input type="submit" value="Envoyer">
  <br>

<!-- Ouverture de la liste déroulange pour l'âge -->
<select name='age'>
<?php
// On le fait en php pour ne pas devoir noter les options de 1 à 100
  for($i=1;$i<=100;$i++) // On initialise i à 1; si i est inférieur ou égal à 100; incrémentation du i;
  {
  echo "<option value=".$i.">" .$i.  ($i == 1 ? ' an' : ' ans' ) . " </option>"; // La valeur de l'option est i; on affiche i dans la liste;
  }
/* ($i == 1 ? ' an' : ' ans' ) est un opérateur ternaire (un if en  plus petit)
Si i est égal à 1, on affiche 'an' sinon on affiche 'ans'
*/
?>
</select>

<!-- Une autre manière de faire...
<select name='age2'>
<?php

$i=1;
do
{
  if ($i==1)
    {
    echo "<option value=".$i.">".$i." an</option>";
    $i++;
    }
  else
    {
    echo "<option value=".$i.">".$i." ans</option>";
    $i++;
    }
} while ($i <= 100)
?>
</select>
-->

  <br>
  <input type="radio" value="un homme" name="genre"> Homme
  <input type="radio" value="une femme" name="genre"> Femme
</form>
