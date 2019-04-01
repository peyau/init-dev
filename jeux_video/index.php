<?php
// connexion à la base de données
include('connect.php');

// si la page index est affichée suite à un ajout
if (isset($_POST['bvalider']))
{
	include('recupdata.php');
	if ($_POST['encours'])
	{
		if ($_POST['encours']==-1) 
		{
			include('insert.php');
		}
		else
		{	
			$encours = $_POST['encours'];
			include('update.php');
		}
	}
	else
	{
		echo ('La commande n\'a pas pu être exécutée');
	}
}

// récupération des limites d'affichage des données
if (isset($_GET['debut'])) { $debut=(int)($_GET['debut']); } else { $debut=0; }
$nombre=10; // c'est le nombre d'enregistrements affichés sur une page

// Récupération de l'ordre d'affichage (par défaut, sur le nom du jeu)
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

// Croissant ou décroissant ? 
if (isset($_GET['croissant'])) { $croissant = ($_GET['croissant']); } else { $croissant=1; }

// Recherche sur le nom ?
if (isset($_GET['rnom'])) { $rnom = $_GET['rnom'] ; } else { $rnom=''; }

// Formulaire permettant de sélectionner l'ordre dans lequel doivent apparaître les informations
?>
<form method="GET" action="index.php" name="frech">
Recherche : <br />
Nom : <input type="text" name="rnom" value="<?php echo $rnom; ?>" /><br />
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

<script type="text/javascript">
document.frech.rnom.focus();
</script>


</form>

<?php
// Faut-il filtrer la requête ?
if ($rnom=='') 
{ 
	$where = '';
} 
else
{
	$where = 'WHERE nom LIKE :rnom ';
}

$rech = '%' .  $rnom . '%';

// calcul du nombre de pages
$req = $bdd->prepare('SELECT COUNT(*) FROM jeux_video ' . $where);
if ($rnom=='') 
{ 
	$req->execute();
}
else
{
	$req->execute(array(':rnom'=>$rech));
}
$rep = $req->fetch();
$nbenreg = $rep[0]; // récupération du nombre d'enregistrements présents dans la table
$req->closeCursor();

if ($nbenreg==0)
{
	echo 'Aucun enregistrement ne correspond au critère de recherche';
}
else
{

	//Le nombre de pages est égal au nombre d'enregistrements / nb enreg par page
	$nbpages=ceil($nbenreg/$nombre);

	// Ordre croissant ou décroissant ?
	$str_croissant = ($croissant == 1) ? '' : ' DESC' ;

	// preparation de la requête
	$req = $bdd->prepare('SELECT * FROM jeux_video ' . $where .' ORDER BY ' . $ordre . $str_croissant . ' LIMIT :debut, :nombre') or die(print_r($bdd->errorInfo()));
	if ($rnom!='') { $req->bindParam(':rnom', $rech , PDO::PARAM_STR); }
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
		echo '<td>'.$donnees['commentaires'].'</td>';
		echo '<td><a href="modif.php?id='.$donnees['ID'].'">Modifier</a></td></tr>';
	}	

	echo '</table><br />-';

	for ($i=1 ; $i<=$nbpages ; $i++)
	{
		echo ' <a href="index.php?rnom=' . $rnom . '&amp;ordre=' . $ordre . '&amp;croissant=' . $croissant . '&amp;debut=' . ($i-1)*$nombre .'">' .$i . '</a> -';
	}	

	$req->closeCursor();

}
?>
<br /><br />
<a href="ajout.php">Ajouter</a>