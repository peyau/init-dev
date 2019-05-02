<?php

class SomeOne{
	private $nom, $prenom;	
	
	public function changerNom($nouveauNom){
		$this->nom=$nouveauNom;
	}
	
	public function changerPrenom($nouveauPrenom){
		$this->prenom=$nouveauPrenom;
	}
	
	public function nom(){
		return $this->nom;
	}
	
	public function prenom(){
		return $this->prenom;
	}
}

$perso1=new SomeOne();
$perso1->changerNom("VANDERSTICHELEN");
$perso1->changerPrenom("Joshua");

$perso2=new SomeOne();
$perso2->changerNom("CAZIER");
$perso2->changerPrenom("Johan");

echo $perso1->nom().' '.$perso1->prenom().'<br/>';
$perso1->changerNom("SANSSE");
echo $perso2->nom().' '.$perso2->prenom().'<br/>';
echo $perso1->nom().' '.$perso1->prenom().'<br/>';

?>