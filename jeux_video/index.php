<?php
// connexion � la base de donn�es
include('connect.php');

// r�cup�ration des limites d'affichage des donn�es
if (isset($_GET['debut'])) {
	$debut=(int)($_GET['debut']);
} else {
	$debut=0;
}
$nombre=10; // c'est le nombre d'enregistrements affich�s sur une page

// calcul du nombre de pages
$req = $bdd->query('SELECT COUNT(*) FROM jeux_video');
$rep = $req->fetch();
$nbenreg = $rep[0]; // r�cup�ration du nombre d'enregistrements pr�sents dans la table
$req->closeCursor();

//Le nombre de pages est �gal au nombre d'enregistrements / nb enreg par page
$nbpages=ceil($nbenreg/$nombre); // ceil permet d'arrondir le nombre au nombre supérieur

// preparation de la requ�te
$req = $bdd->prepare('SELECT * FROM jeux_video LIMIT :debut, :nombre') or die(print_r($bdd->errorInfo()));
$req->bindParam('debut', $debut, PDO::PARAM_INT);
$req->bindParam('nombre', $nombre, PDO::PARAM_INT);
$req->execute();

echo '<table border="1">';
echo '<tr><td>Nom</td><td>Possesseur</td><td>Console</td><td>Prix</td><td>Nb de joueurs max.</td><td>Commentaire</td></tr>';
while ($donnees = $req->fetch())
{
	echo '<tr><td>'.$donnees['nom'].'</td>';
	echo '<td>'.$donnees['possesseur'].'</td>';
	echo '<td>'.$donnees['console'].'</td>';
	echo '<td>'.$donnees['prix'].'</td>';
	echo '<td>'.$donnees['nbre_joueurs_max'].'</td>';
	echo '<td>'.$donnees['commentaires'].'</td></tr>';
}
echo '</table><br />-';

for ($i=1 ; $i<=$nbpages ; $i++)
{
 echo ' <a href="index.php?debut=' . ($i-1)*$nombre .'">' .$i . '</a> -';

}

$req->closeCursor();

?>
