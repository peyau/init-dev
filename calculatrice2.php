<html>
<head><title>Calculateur</title></head>
<body>
<h1>Calculateur</h1><br>
<form method='post' action=''>
Nombre 1 : <input type="text" name="nombre1">
Nombre 2 : <input type="text" name="nombre2">
<br>
<select name="choix">
    <option value="addition">+</option>
    <option value="soustraction">-</option>
    <option value="division">/</option>
    <option value="multiplication">*</option>
</select>

<input type="submit" value="calculer">
<input type="reset" value="effacer"><br>
</form>
</body>
</html>


<?php
if(isset($_POST['nombre1']) AND isset($_POST['choix']) AND isset($_POST['nombre2'])) // Si les varaibles existent ...
{
    $nombre1 =htmlspecialchars($_POST['nombre1']); // On sécurise ...
    $choix = htmlspecialchars($_POST['choix']);
    $nombre2 = htmlspecialchars($_POST['nombre2']);

    if($nombre1 != NULL AND $nombre2 != NULL) // Puis on vérifie leur valeur ...
    {
        if($choix == 'division' AND $nombre2 == 0)
        {
            echo 'On peut pas diviser par 0 voyons !';
        }
        else
        {
            if($choix == 'addition')
            {
            $resultat = $nombre1 + $nombre2;
            echo 'La somme de ces deux nombres est '.$resultat;
            }

            if($choix == 'soustraction') // Si on a choisi la soustraction, on calcul la différence.
            {
            $resultat = $nombre1 - $nombre2; // On calcul
            echo 'La différence de ces deux nombres est '.$resultat; // Puis on affiche le résultat
            }

            if($choix == 'multiplication')
            {
            $resultat = $nombre1 * $nombre2;
            echo 'Le produit de ces deux nombres est '.$resultat;
            }

            if($choix == 'division')
            {
            $resultat = $nombre1 / $nombre2;
            echo 'Le quotient de ces deux nombres est '.$resultat;
            }
        }
        }
    else // Si les champs n'ont pas étaient renseigné, on affiche un message d'erreur ...
    {
    echo 'Veuillez renseigner tous les champs.';
    }

}
?>
