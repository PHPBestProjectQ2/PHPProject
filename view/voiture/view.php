<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title><?php echo $pagetitle; ?></title>
</head>
<body>
	<header>
		<div style="
		text-align: center;
		position:relative;
		margin-right: auto;
		margin-left: auto; 
		padding:5%;
		border-radius: 25px;
		background: cornflowerblue;
		padding: 20px;
		width: 60%;
		height: 150px;
		line-height: 9em;">

		<a href='./index.php?action=readAll'>Accueil Voitures</a>
		<a href='./index.php?action=readAll&controller=utilisateur'>Accueil Utilisateurs</a>
		<a href='./index.php?action=readAll&controller=trajet'>Accueil Voitures</a>
		<a href='./view/voiture/create.php'>Creer une voiture !</a>
		<a href='./view/voiture/preference.html'>Definir sa préference</a>
	</div>
</header>
<?php
// Si $controleur='voiture' et $view='list',
// alors $filepath="/chemin_du_site/view/voiture/list.php"
$filepath = File::build_path(array("view", $controller, "$view.php"));
	require $filepath;
	?>
	<footer> <p style="border: 1px solid black;text-align:right;padding-right:1em;">
		Site de covoiturage de Romain Cadarsi
	</p>

</footer>
</body>
</html>

