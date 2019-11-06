<?php
$DS = DIRECTORY_SEPARATOR;


require_once (File::build_path(array("controller","ControllerCommande.php")));

$tab_actions = get_class_methods('ControllerCommande');	
$defautControllerClass = 'ControllerCommande';
$defautController = 'commande';
if(isset($_COOKIE['preference'])){
	$defautControllerClass= 'Controller' . ucfirst($_COOKIE['preference']);
	$defautController = $_COOKIE['preference'];


}

if(isset($_GET['controller'])){
	$controller_class = 'Controller' . ucfirst($_GET['controller']);
	$controller = $_GET['controller'];
	if(class_exists(class_name)){
		
	}
}
else{
	$controller_class = $defautControllerClass;
	$controller = $defautController;
}

if(isset($_GET['action'])){
	$action = $_GET['action'];
	if($_GET['action'] == 'read'){
		$idCommande = $_GET['idCommande'];
		ControllerCommande::$action($idCommande); 
	}


	elseif($_GET['action'] == 'delete'){
		$idCommande = $_GET['idCommande'];
		ControllerCommande::deleted($idCommande);
	}
	elseif($_GET['action'] == 'create'){
		//A FAIRE
		ControllerCommande::created(//AFAIRE);
	}
	elseif($_GET['action'] == 'update'){
		$idCommande = $_GET['idCommande'];
		ControllerCommande::update($idCommande);
	}
	elseif($_GET['action'] == 'updated'){
		//A FAIRE
		ControllerCommande::updated(//A FAIRE);
	}
	elseif (in_array($action, $tab_actions)) {
		ControllerCommande::$action(); 
	}

	else{
		ControllerCommande::error();
	}

}
else{
	ControllerCommande::readall();
}



?>
