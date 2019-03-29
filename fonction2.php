<?php

function calculCube(int $a): int { // Le deuxième int permet de typer la valeur de retour
   return ($a * $a * $a); // Return permet à la fonction de retourner un résultat, ça veut dire qu'on peut stocker cette valeur dans une variable (comme fait en dessous)
}

$volume=calculCube(4);
echo $volume;

// -----------------------------------------------------------------------------
echo '<br>';

function noms(): array {
    return ["Toto","Bernard","Roger"]; // Ou écrire return array("Toto","Bernard","Roger")
}

$noms = noms();
print_r($noms);
