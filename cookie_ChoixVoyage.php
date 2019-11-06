<?php
	
		$choixVoyage = $_POST['choix'];
		//var_dump($_POST['choix']);
		setcookie("choixVoyage", $choixVoyage, time()+3600);
	

?>