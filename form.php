<!--
******************************
*         Formulaire         *
******************************
-->
<?php

/* Le $_GET se met TOUJOURS en majuscules et permet  */
$size = count($_GET);

if($size != 0) // Si le formulaire GET est envoyé
{
 echo 'Formulaire envoyé!' . '<br>';
 $nb1 = $_GET['nombre1']; // Récupérer la valeur dans le champ "nombre1"
 $nb2 = $_GET['nombre2']; // Récupérer la valeur dans le champ "nombre2"

 $somme = $nb1 + $nb2; // Création d'une variable pour additionner les 2 nombres
 echo 'la réponse est ' . $somme; // On affiche le résultat
}


?>


<!-- "action" permet de définir le chemin de destination sur lequel on va poster les informations -->
<!-- "method" (les valeurs qui peuvent entrer dedans sont "get" et "post") définit comment on transporte les informations (dans l'url (get), ou implicitement pour l'utilisateur(post)) -->
<form action="" method="GET">
  Premier nombre  <input type="text" name="nombre1">
  Second nombre <input type="text" name="nombre2">
  <input type="submit" value="Envoyer">
</form>
