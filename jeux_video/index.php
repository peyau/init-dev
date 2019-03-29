<head>
  <meta charset="UTF-8" />
</head>

<?php
// Connexion à la base de données
$bdd = new PDO ('mysql:host=localhost;dbname=test2', 'root', '');

// Préparation de la requêtemp
$req = $bdd->prepare('SELECT * FROM jeux_video');
$req->execute();

echo '<table border="1">';
echo '<tr><td>Nom</td><td>Possesseur</td><td>Console</td><td>Prix</td><td>Nb de joueurs max.</td><td>Commentaire</td></tr>';

while ($donnees = $req->fetch()) {
  echo '<tr><td>' . $donnees['nom'] . '</td>';
  echo '<td>' . $donnees['possesseur'] . '</td>';
  echo '<td>' . $donnees['console'] . '</td>';
  echo '<td>' . $donnees['prix'] . '</td>';
  echo '<td>' . $donnees['nbre_joueurs_max'] . '</td>';
  echo '<td>' . $donnees['commentaires'] . '</td></tr>';
}

echo '</table>';
