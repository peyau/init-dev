<?php

try {
    include("connect.php");
} catch (\Exception $error){
    error_log($error->getMessage());
    echo 'Erreur: connexion BDD impossible.';
}

$req = $bdd->query('SELECT * FROM utilisateur');

$data = $req->fetchAll(PDO::PARAM_STR);
/*
echo '<pre>';
print_r($req->fetchAll(PDO::PARAM_STR));
*/
?>

<table border="1">
<thead>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Genre</th>
        <th>Adresse</th>
        <th>Code postal</th>
        <th>Ville</th>
        <th>E-mail</th>
        <th>Téléphone</th>
        <th>Type</th>
        <th>Password</th>
    </tr>
</thead>

<tbody>
<?php
/*
while ($donnees = $req->fetch()) {
  echo '<tr><td>' . $donnees['id'] . '</td>';
  echo '<td>' . $donnees['nom'] . '</td>';
  echo '<td>' . $donnees['prenom'] . '</td>';
  echo '<td>' . $donnees['genre'] . '</td>';
  echo '<td>' . $donnees['adresse'] . '</td>';
  echo '<td>' . $donnees['code_postal'] . '</td>';
  echo '<td>' . $donnees['ville'] . '</td>';
  echo '<td>' . $donnees['email'] . '</td>';
  echo '<td>' . $donnees['telephone'] . '</td>';
  echo '<td>' . $donnees['type'] . '</td>';
  echo '<td>' . $donnees['password'] . '</td>';
}
*/
foreach ($data as $donnees) {
    echo '<tr><td>' . $donnees['id'] . '</td>';
    echo '<td>' . $donnees['nom'] . '</td>';
    echo '<td>' . $donnees['prenom'] . '</td>';
    echo '<td>' . $donnees['genre'] . '</td>';
    echo '<td>' . $donnees['adresse'] . '</td>';
    echo '<td>' . $donnees['code_postal'] . '</td>';
    echo '<td>' . $donnees['ville'] . '</td>';
    echo '<td>' . $donnees['email'] . '</td>';
    echo '<td>' . $donnees['telephone'] . '</td>';
    echo '<td>' . $donnees['type'] . '</td>';
    echo '<td>' . $donnees['password'] . '</td>';
}
?>

</tbody>
</table>
