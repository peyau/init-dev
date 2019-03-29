<?php

// -----------------------------------------------------------------------------
/*
echo '<pre>'; // Permet d'épurer l'affichage du print_r
echo 'Bonjour ' . $_GET['prenom'] . ' ' . $_GET['nom'] . '<br>';
echo 'Vous avez ' . $_GET['age'] . ' ans' . '<br>';
echo 'Vous êtes ' . $_GET['genre'] . '<br>' . '<br>';
*/

// -----------------------------------------------------------------------------

/*
echo 'Le premier nombre est ' . $_GET['nombre1'] . '<br>';
echo 'Le deuxième nombre est ' . $_GET['nombre2'] . '<br>';

$calcul = $_GET['nombre1'] / $_GET['nombre2'];
$modulo = $_GET['nombre1'] % $_GET['nombre2'];

echo '<br>';

echo 'Résultat de la division ' . $calcul . '<br>';
echo 'Le modulo est ' . $modulo . '<br>';
*/

// -----------------------------------------------------------------------------

// Cette manière de faire permet de ne pas afficher les erreurs sur la page web si le champ n'est pas complété

$prenom= ''; // Création de la variable à vide
if(isset($_GET['prenom'])) // isset définit si la variable existe et est différente de NULL
{
$prenom=$_GET['prenom']; // On modifie la valeurde la variable
echo 'Prénom: ' . $prenom;
}

echo '<br>';

$nom= ''; // Création de la variable à vide
if(isset($_GET['nom'])) // isset permet de déterminer si une variable est définie et est différente de NULL
{
$nom=$_GET['nom']; // On modifie la valeurde la variable
echo 'Nom: ' . $nom;
}
// echo $prenom; // On affiche la variable

// -----------------------------------------------------------------------------

/*
$size = count($_GET);

echo $size . ' valeurs sont entrées' . '<br>';
print_r($_GET);
*/
