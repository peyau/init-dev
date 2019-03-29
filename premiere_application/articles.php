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
  echo '<td align="center"><a href="?modify='. $donnees['id_art'] . '">&#9998;</a></td>';
  echo '<td align="center"><a href="?delete='. $donnees['id_art'] . '">&#x274C;</a></td>';
}

echo '</tr></table>';

// Pour modifier un article
if(isset($_GET['modify'])) { // Si l'élément est envoyé dans l'URL
    $id=$_GET['modify']; // Alors on récupère l'ID

    $reqDisplay = $bdd->prepare("SELECT * FROM article WHERE id_art=$id"); // On prépare la requête
    $reqDisplay->execute(); // On l'exécute

    while ($enregistrements = $reqDisplay->fetch()) {
    echo '<form action="" method="post">
        <table>
            <tr>
                <td><label for="designation">Désignation</td>
                <td><input id="designation" type="text" name="design_art" value="'. $enregistrements['design_art'] .'"></td>
            </tr>

            <tr>
                <td><label for="prix">Prix</td>
                <td><input id="prix" type="text" name="prix_art" value="'. $enregistrements['prix_art'] .'"></td>
            </tr>

            <tr>
                <td><input type="submit" value="Envoyer"></td>
                <td><input type="reset" value="Réinitialiser"></td>
            </tr>
        </table>
    </form>';
    } // Fin du while
} // Fin du isset

if(isset($_POST['design_art'])){
    $id=$_GET['modify'];

    $req=$bdd->prepare('UPDATE article SET design_art=:design_art, prix_art=:prix_art WHERE id_art='.$id.'');

    $req->bindValue(':design_art', $_POST['design_art'], PDO::PARAM_STR);
    $req->bindValue(':prix_art', $_POST['prix_art'], PDO::PARAM_STR);

    $verif=$req->execute();


    if($verif){
        echo 'ok';
    } else {
        print_r($req->errorInfo());
        echo 'fail';
    }
}
?>

</body>
</html>
