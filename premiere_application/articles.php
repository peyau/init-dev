<html>
  <head>
    <title>Bdd articles</title>
  </head>

<body>
<?php

include 'connect.php';
// Préparation de la requêtemp
$req = $bdd->prepare('SELECT * FROM article');
$req->execute();

echo '<table border="1">';
echo '<tr>
<td>ID</td>
<td>Désignation</td>
<td>Prix</td>
</tr>';

while ($donnees = $req->fetch()) {
  echo '<tr><td>' . $donnees['id_art'] . '</td>';
  echo '<td>' . $donnees['design_art'] . '</td>';
  echo '<td>' . $donnees['prix_art'] . '€' . '</td>';
}

echo '</table>';
?>

</body>
</html>
