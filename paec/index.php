<?php

include('client.classe.php');

// ********************************* //
// ****** Création des objets ****** //
// ********************************* //
$voiture1 = new Voiture('Citroën', 'C2', 'Essence');
$voiture2 = new Voiture('Citroën', 'C3', 'Diesel');


// Afficher certains éléments de l'objet
echo $voiture1->getMarque() . ' '. $voiture1-> getModele() . ' ' .  $voiture1->getCarburant() . '<br>';

// Modification de cet objet
$voiture1->setMarque('test');

// On le réaffiche avec la modification
echo $voiture1->getMarque();
