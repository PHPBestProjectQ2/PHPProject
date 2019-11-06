<?php
$DS = DIRECTORY_SEPARATOR;


require_once (File::build_path(array("controller","ControllerVoiture.php")));

$tab_actions = get_class_methods('ControllerVoiture');	
$defautControllerClass = 'ControllerVoiture';
$defautController = 'voiture';
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
		$immatid = $_GET['immat'];
		ControllerVoiture::$action($immatid); 
	}


	elseif($_GET['action'] == 'delete'){
		$immatid = $_GET['immatriculation'];
		ControllerVoiture::deleted($immatid);
	}
	elseif($_GET['action'] == 'create'){
		$immatid = $_GET['immatriculation'];
		$marque = $_GET['marque'];
		$couleur = $_GET['couleur'];
		ControllerVoiture::created($marque,$couleur,$immatid);
	}
	elseif($_GET['action'] == 'update'){
		$immatid = $_GET['immatriculation'];
		ControllerVoiture::update($immatid);
	}
	elseif($_GET['action'] == 'updated'){
		$immatid = $_GET['immatriculation'];
		$marque = $_GET['marque'];
		$couleur = $_GET['couleur'];
		ControllerVoiture::updated($marque,$couleur,$immatid);
	}
	elseif (in_array($action, $tab_actions)) {
		ControllerVoiture::$action(); 
	}

	else{
		ControllerVoiture::error();
	}

}
else{
	ControllerVoiture::readall();
}



?>
