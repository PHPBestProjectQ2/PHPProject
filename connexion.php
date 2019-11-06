<?php
session_start();
require_once File::build_path(array('model', 'Model.php'));

if(isset($_POST['formulaireConnexion'])){
	$emailConnexion = htmlspecialchars($_POST['emailConnexion']);
	$passwordConnexion = sha1($_POST['passwordConnexion']);
	if(!empty($emailConnexion) AND !empty($passwordConnexion)){
		// vérification de l'existence l'émail pour le log in
		$verif_email = $pdo->prepare("SELECT * From /*nom de la table*/ WHERE email = ? AND password = ?")
		$verif_email->execute(array($emailConnexion, $passwordConnexion));
		$email_exist = $verif_email->rowCount();

		if($email_exist == 1){
			// si l'adresse email est valide on vas chercher les informations de l'utilisateur qu'on vas stocker dans une nouvelle variable de session.
			$info_user = $verif_email->fetch();
			$_SESSION['id'] = $info_user['id'];
			$_SESSION['login'] = $info_user['login'];
			$_SESSION['email'] = $info_user['email'];

			// header de location qui renvoie vers profil.php avec une variable qui vas transiter à travers l'url 
			// -> ca va rediriger vers le profil auquel correspond l'id donc le profil qui vient de se connecter.
			header("Location : profil.php?id=".$_SESSION['id']);

		}
		else{
			$error = "L'adresse email est erroné."
		}
	}
	else{
		$error="Tout les champs ne sont pas remplis. Veuillez remplir tout les champs."
	}
}
?>


<html>
		<head>
			<title>
				
			</title>
			<meta charset="utf-8">
		</head>
		<body>
			<div align="center">
				<h2>Connexion à l'espace personnel : </h2>
				<br>
				<br>
				<br>
				<form method="POST" action=""> 
					<input type="email" name="emailConnexion" placeholder="email" />
					<input type="password" name="passwordConnexion" placeholder="Mot de passe" />
					<input type="submit" name="formulaireConnexion"  value="Se connecter." />
				</form>
				<?php
					if(isset($error)){
						echo($error);
					}
					// le méssage d'érreur est initialisé differement selon l'erreur présente dans le formulaire ainsi elle est automatiquement dysplay si elle est initialisée.

				?>
			</div>
		</body>

</html>