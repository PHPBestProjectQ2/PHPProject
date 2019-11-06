<?php
require_once (File::build_path(array("model","ModelCommande.php")));
class ControllerCommande{
	public static function readAll(){
		$tab_v = ModelCommande::getAllCommandes();
		$controller='commande';
		$view='list';
		$pagetitle='Liste des commandes';
		require (File::build_path(array("view","commande","view.php"))); 
	}

	public static function deleted($idcommande){
		$tab_v = ModelCommande::getCommandeByIdCommande($idcommande);
		if(empty($tab_v)){
			$controller='commande';
			$view='error';
			$pagetitle='Erreur';
			require(File::build_path(array("view","commande","view.php")));
		}
		else {
			ModelCommande::delete($idcommande);
			$idcommande = $idcommande;
			$controller='commande';
			$view='deleted';
			$pagetitle='Commande supprimé';
			require_once(File::build_path(array("view","commande","view.php")));
		}
	}

	public static function read($idcommande){
		$tab_v = ModelCommande::getCommandeByIdCommande($idcommande);
		if(empty($tab_v)){
			$controller='commande';
			$view='error';
			$pagetitle='Erreur';
			require(File::build_path(array("view","commande","view.php")));
		}

		else{
			$controller='commande';
			$view='detail';
			$pagetitle='Detail de la commande';
			require (File::build_path(array("view","commande","view.php")));
		}
	}
	public static function created($idcommande //){
		$com1 = new ModelCommande(//);
		$com1->save();
		$tab_c = ModelCommande::getAllCommandes();
		$controller='commande';
		$view='created';
		$pagetitle='Commande crée';
		require (File::build_path(array("view","commande","view.php")));

	}

	public static function update($idcommande){
		$tab_v = ModelCommande::getCommandeByIdcommande($idcommande);
		if(empty($tab_v)){
			$controller='commande';
			$view='error';
			$pagetitle='Erreur';
			require(File::build_path(array("view","commande","view.php")));
		}
		else{
			$controller='commande';
			$view='update';
			$pagetitle='Modifier la commande';
		require(File::build_path(array("view","commande","view.php")));}
		
		
	}

	public static function updated(//){
		$tab_v = ModelCommande::getCommandeByIdcommande($idcommande);
		foreach ($tab_v as $v) {
			$v->update(//);
		}
		$controller='commande';
		$view='updated';
		$pagetitle='Commande a mettre a jour';
		require(File::build_path(array("view","commande","view.php")));
	}

	public static function error(){
		$controller='commande';
		$view='error';
		$pagetitle='Commande non trouvé';
		require(File::build_path(array("view","commande","error.php")));
	}
}
?>