<?php
require_once (File::build_path(array("model","ModelVoiture.php")));
class ControllerVoiture{
	public static function readAll(){
		$tab_v = ModelVoiture::getAllVoitures();
		$controller='voiture';
		$view='list';
		$pagetitle='Liste des voitures';
		require (File::build_path(array("view","voiture","view.php"))); 
	}

	public static function deleted($immatid){
		$tab_v = ModelVoiture::getVoitureByImmat($immatid);
		if(empty($tab_v)){
			$controller='voiture';
			$view='error';
			$pagetitle='Erreur';
			require(File::build_path(array("view","voiture","view.php")));
		}
		else {
			ModelVoiture::delete($immatid);
			$immat = $immatid;
			$controller='voiture';
			$view='deleted';
			$pagetitle='Voiture supprimé';
			require_once(File::build_path(array("view","voiture","view.php")));
		}
	}

	public static function read($immatid){
		$tab_v = ModelVoiture::getVoitureByImmat($immatid);
		if(empty($tab_v)){
			$controller='voiture';
			$view='error';
			$pagetitle='Erreur';
			require(File::build_path(array("view","voiture","view.php")));
		}

		else{
			$controller='voiture';
			$view='detail';
			$pagetitle='Detail de la voiture';
			require (File::build_path(array("view","voiture","view.php")));
		}
	}
	public static function created($immatid,$marque,$couleur){
		$voit1 = new ModelVoiture($marque,$couleur,$immatid);
		$voit1->save();
		$tab_v = ModelVoiture::getAllVoitures();
		$controller='voiture';
		$view='created';
		$pagetitle='Voiture crée';
		require (File::build_path(array("view","voiture","view.php")));

	}

	public static function update($immatid){
		$tab_v = ModelVoiture::getVoitureByImmat($immatid);
		if(empty($tab_v)){
			$controller='voiture';
			$view='error';
			$pagetitle='Erreur';
			require(File::build_path(array("view","voiture","view.php")));
		}
		else{
			$controller='voiture';
			$view='update';
			$pagetitle='Modifier la voiture';
		require(File::build_path(array("view","voiture","view.php")));}
		
		
	}

	public static function updated($marque,$couleur,$immatid){
		$tab_v = ModelVoiture::getVoitureByImmat($immatid);
		foreach ($tab_v as $v) {
			$v->update($marque,$couleur,$immatid);
		}
		$controller='voiture';
		$view='updated';
		$pagetitle='Voiture a mettre a jour';
		require(File::build_path(array("view","voiture","view.php")));
	}

	public static function error(){
		$controller='voiture';
		$view='error';
		$pagetitle='Voiture non trouvé';
		require(File::build_path(array("view","voiture","error.php")));
	}
}
?>