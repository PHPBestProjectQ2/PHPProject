<?php
session_start();
$_SESSION['login'] = "cadarsir";
$_SESSION['tableau'] = ["1","2","3"];

class ModelVoiture {
	private $marque;
	private $couleur;
	private $immatriculation;

          // un getter      
	public function getMarque() {
		return $this->marque;  
	}

          // un setter 
	public function setMarque($marque2) {
		$this->marque = $marque2;
	}

	public function getCouleur() {
		return $this->couleur;  
	}

	public function setCouleur($couleur2) {
		$this->couleur = $couleur2;
	}

	public function getImmatriculation() {
		return $this->immatriculation;  
	}

	public function setimmatriculation($immatriculation2){
		if (strlen($immatriculation2<=8)){
			$this->immatriculation = $immatriculation2;
		}
	}


          // un constructeur

// La syntaxe ... = NULL signifie que l'argument est optionel
// Si un argument optionnel n'est pas fourni,
//   alors il prend la valeur par défaut, NULL dans notre cas
	public function __construct($m = NULL, $c = NULL, $i = NULL) {
		if (!is_null($m) && !is_null($c) && !is_null($i)) {
    // Si aucun de $m, $c et $i sont nuls,
    // c'est forcement qu'on les a fournis
    // donc on retombe sur le constructeur à 3 arguments
			$this->marque = $m;
			$this->couleur = $c;
			$this->immatriculation = $i;
		}
	}

}
$_SESSION['objet'] = new ModelVoiture("benz","rouge","3211");

echo $_SESSION['objet']->getMarque();

unset($_SESSION['objet']);
echo $_SESSION['objet']->getMarque();