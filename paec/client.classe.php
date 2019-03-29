<?php
// ********************************* //
// **** Déclaration des classes **** //
// ********************************* //

/*class Client {
    private $nom = 'Levaux'; // Déclaration d'une variable "privée"
    private $prenom = 'Jonathan';

    public function modifierNom($nouveauNom){ // Déclaration d'une fonction "publique"
      $this->nom=$nouveauNom; // $this permet de travailler avec CETTE variable $nom et pas une autre
    }

    public function afficheQui(){ // Fonction qui permet d'afficher CE nom et CE prenom
      echo $this->nom . ' ' . $this->prenom . '<br>';
    }
}

$client1 = new Client; // Création d'un nouveau client dans la variable $client1
$client1->afficheQui(); // Appel de la fonction afficheQui pour le client1
$client1->modifierNom('truc'); // Modifier le nom du client1
$client1->afficheQui();  // Réafficher avec la modification

echo '<br>';*/
//------------------------------------------------------------------------------
class Voiture {
    private $marque;
    private $sousMarque;
    private $carburant;
    private $plaque;
    // Création du construct
    public function __construct($marque, $modele, $carburant){
      $this->setMarque($marque);
      $this->setModele($modele);
      $this->setCarburant($carburant);
    }
    // Modifier la marque
    public function setMarque($nMarque){
      $this->marque=$nMarque;
    }
    // Modifier la sous marque
    public function setModele($nModele){
      $this->modele=$nModele;
    }
    // Modifier la plaque
    public function setCarburant($nCarburant){
      $this->carburant=$nCarburant;
    }
    // Retourne une valeur pour l'afficher plus tard
    public function getMarque(){
      return $this->marque;
    }

    public function getModele(){
      return $this->modele;
    }

    public function getCarburant(){
      return $this->carburant;
    }

    /*
    public function afficherVoiture(){
      echo $this->marque . ' | ' . $this->modele . ' | ' . $this->carburant . '<br>';
    }
    */
}
