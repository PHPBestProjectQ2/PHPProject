<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Mon premier php </title>
    </head>
   
    <body>
       <?php
       require_once('./model/ModelVoiture.php');
       $voiture1 = new ModelVoiture($_POST['marque'],$_POST['couleur'],$_POST['immatriculation']);
       $voiture1->afficher();
       $voiture1->save();
       ?>
    </body>
</html> 