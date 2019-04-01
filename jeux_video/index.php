<?php
// connexion � la base de donn�es
include('connect.php');

// r�cup�ration des limites d'affichage des donn�es
if (isset($_GET['debut'])) { $debut=(int)($_GET['debut']); } else { $debut=0; }
$nombre=10; // c'est le nombre d'enregistrements affich�s sur une page

// R�cup�ration de l'ordre d'affichage (par d�faut, sur le nom du jeu)
if (isset($_GET['ordre']))
{ 	switch ($_GET['ordre'])
	{
		case 'possesseur' : $ordre = $_GET['ordre']; break;
		case 'console' : $ordre = $_GET['ordre']; break;
		case 'prix' : $ordre = $_GET['ordre']; break;
		case 'nbre_joueurs_max' : $ordre = $_GET['ordre']; break;
		default : $ordre = 'nom';
	}
}
else
{
	$ordre = 'nom';
}
// Croissant ou d�croissant ?
if (isset($_GET['croissant'])) { $croissant = ($_GET['croissant']); } else { $croissant=1; }

// Formulaire permettant de s�lectionner l'ordre dans lequel doivent appara�tre les informations
?>
<form method="GET" action="index.php">
Trier les informations par :
<select name="ordre">
	<option value="nom" <?php if ($ordre=='nom') echo 'SELECTED'; ?>>nom du jeu</option>
	<option value="possesseur" <?php if ($ordre=='possesseur') echo 'SELECTED'; ?>>possesseur du jeu</option>
	<option value="console" <?php if ($ordre=='console') echo 'SELECTED'; ?>>console</option>
	<option value="prix" <?php if ($ordre=='prix') echo 'SELECTED'; ?>>prix</option>
	<option value="nbre_joueurs_max" <?php if ($ordre=='nbre_joueurs_max') echo 'SELECTED'; ?>>nombre de joueurs maximum</option>
</select>

<input type="checkbox" name="croissant" id="croissant" <?php if ($croissant==0) { echo 'CHECKED';} ?>/>
<label for="croissant">Décroissant</label>

<input type="submit" name="bappliquer" value="Appliquer" />
</form>

<?php
// calcul du nombre de pages
$req = $bdd->query('SELECT COUNT(*) FROM jeux_video');
$rep = $req->fetch();
$nbenreg = $rep[0]; // r�cup�ration du nombre d'enregistrements pr�sents dans la table
$req->closeCursor();

//Le nombre de pages est �gal au nombre d'enregistrements / nb enreg par page
$nbpages=ceil($nbenreg/$nombre);

// Ordre croissant ou d�croissant ?
$str_croissant = ($croissant == 1) ? '' : ' DESC' ;

// preparation de la requ�te
$req = $bdd->prepare('SELECT * FROM jeux_video ORDER BY ' . $ordre . $str_croissant . ' LIMIT :debut, :nombre') or die(print_r($bdd->errorInfo()));
$req->bindParam(':debut', $debut, PDO::PARAM_INT);
$req->bindParam(':nombre', $nombre, PDO::PARAM_INT);
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
 echo ' <a href="index.php?ordre=' . $ordre . '&amp;croissant=' . $croissant . '&amp;debut=' . ($i-1)*$nombre .'">' .$i . '</a> -';

}

$req->closeCursor();

?>
