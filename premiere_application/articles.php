<html>
  <head>
    <title>Bdd articles</title>
  </head>

<body>
<?php

include 'connect.php';
// Préparation de la requê temp
$req = $bdd->prepare('SELECT * FROM article');
$req->execute();

// Pour supprimer un élément
if(isset($_GET['delete'])) { // Si l'élément est envoyé dans l'URL
    $id=$_GET['delete']; // Alors on récupère l'ID
    $reqdelete = $bdd->prepare("DELETE FROM article WHERE id_art=$id"); // On prépare la requête
    $reqdelete->execute(); // On l'exécute
    header('location:articles.php'); // On renvoie vers la page articles.php
}

// Pour modifier un client
if(isset($_GET['modify'])) { // Si l'élément est envoyé dans l'URL
    $id=$_GET['modify']; // Alors on récupère l'ID
    //$reqdelete = $bdd->prepare("DELETE FROM client WHERE id_cli=$id"); // On prépare la requête
    //$reqdelete->execute(); // On l'exécute
    echo 'Hello';
    //header('location:articles.php'); // On renvoie vers la page clients.php
}

echo '<table border="1">';
echo '<tr>
<td>ID</td>
<td>Désignation</td>
<td>Prix</td>
<td>Modifier</td>
<td>Supprimer</td>
</tr>';


while ($donnees = $req->fetch()) {
  echo '<tr><td>' . $donnees['id_art'] . '</td>';
  echo '<td>' . $donnees['design_art'] . '</td>';
  echo '<td>' . $donnees['prix_art'] . '€' . '</td>';
  echo '<td align="center"><a href="?modify'. $donnees['id_art'] . '">&#9998;</a></td>';
  echo '<td align="center"><a href="?delete='. $donnees['id_art'] . '">&#x274C;</a></td>';
}

echo '</tr></table>';
?>

</body>
</html>
