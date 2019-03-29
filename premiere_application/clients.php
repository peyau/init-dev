<html>
  <head>
    <title>Bdd clients</title>
  </head>

<body>
<?php
include 'connect.php';

$req = $bdd->prepare('SELECT * FROM client');
$req->execute();

echo '<table border="1">';
echo '<tr>
<td>ID</td>
<td>Nom</td>
<td>Prenom</td>
<td>Adresse</td>
<td>Téléphone</td>
</tr>';

while ($donnees = $req->fetch()) {
  echo '<tr><td>' . $donnees['id_cli'] . '</td>';
  echo '<td>' . $donnees['nom_cli'] . '</td>';
  echo '<td>' . $donnees['pre_cli'] . '</td>';
  echo '<td>' . $donnees['adr_cli'] . '</td>';
  echo '<td>' . $donnees['tel_cli'] . '</td>';
}

echo '</table>';
?>

</body>
</html>
