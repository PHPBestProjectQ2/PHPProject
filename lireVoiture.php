<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title> Mon deuxieme php </title>
</head>

<body>
	<?php
	require_once './model/ModelVoiture.php';
	ModelVoiture::getVoitureByImmat(12345678)->afficher();
	$voiture1 = new ModelVoiture(45284592,"Renault","Marron");
	$voiture1->save();



	
	?>



</body>
</html> 