<html>
  <head>
    <title>Bdd clients</title>
  </head>

<body>
<?php
include 'connect.php';

$req = $bdd->prepare('SELECT * FROM client');
$req->execute();

// Pour supprimer un client
if(isset($_GET['delete'])) { // Si l'élément est envoyé dans l'URL
    $id=$_GET['delete']; // Alors on récupère l'ID
    $reqdelete = $bdd->prepare("DELETE FROM client WHERE id_cli=$id"); // On prépare la requête
    $reqdelete->execute(); // On l'exécute
    header('location:clients.php'); // On renvoie vers la page articles.php
}

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
  echo '<td align="center"><a href="?modify='. $donnees['id_cli'] . '">&#9998;</a></td>';
  echo '<td align="center"><a href="?delete='. $donnees['id_cli'] . '">&#x274C;</a></td>';
}

echo '</table>';

// Pour modifier un client
if(isset($_GET['modify'])) { // Si l'élément est envoyé dans l'URL
    $id=$_GET['modify']; // Alors on récupère l'ID

    $reqDisplay = $bdd->prepare("SELECT * FROM client WHERE id_cli=$id"); // On prépare la requête
    $reqDisplay->execute(); // On l'exécute

    while ($enregistrements = $reqDisplay->fetch()) {
    echo '<form action="" method="post">
        <table>
            <tr>
                <td><label for="nom">Nom</td>
                <td><input id="nom" type="text" name="nom_cli" value="'. $enregistrements['nom_cli'] .'"></td>
            </tr>

            <tr>
                <td><label for="prenom">Prenom</td>
                <td><input id="prenom" type="text" name="pre_cli" value="'. $enregistrements['pre_cli'] .'"></td>
            </tr>

            <tr>
                <td><label for="adresse">Adresse</td>
                <td><input id="adresse" type="text" name="adr_cli" value="'. $enregistrements['adr_cli'] .'"></td>
            </tr>

            <tr>
                <td><label for="telephone">Téléphone</td>
                <td><input id="telephone" type="text" name="tel_cli" value="'. $enregistrements['tel_cli'] .'"></td>
            </tr>

            <tr>
                <td><input type="submit" value="Envoyer"></td>
                <td><input type="reset" value="Réinitialiser"></td>
            </tr>

        </table>
    </form>';
    } // Fin du while
} // Fin du isset

if(isset($_POST['nom_cli'])){
    $id=$_GET['modify'];

    //$req = $bdd->prepare('UPDATE `client` SET `nom_cli` = \''.$_POST['nom_cli'].'\' , `pre_cli` = \''.$_POST['pre_cli'].'\',  `adr_cli` = \''.$_POST['adr_cli'].'\' , `tel_cli` = \''.$_POST['tel_cli'].'\' WHERE `id_cli` = '.$id);
    //$verif=$req->execute();

    $req=$bdd->prepare('UPDATE client SET nom_cli=:nom_cli, pre_cli=:pre_cli, adr_cli=:adr_cli, tel_cli=:tel_cli WHERE id_cli='.$id.'');

    $req->bindValue(':nom_cli', $_POST['nom_cli'], PDO::PARAM_STR);
    $req->bindValue(':pre_cli', $_POST['pre_cli'], PDO::PARAM_STR);
    $req->bindValue(':adr_cli', $_POST['adr_cli'], PDO::PARAM_STR);
    $req->bindValue(':tel_cli', $_POST['tel_cli'], PDO::PARAM_STR);

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
