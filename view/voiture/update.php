
<form method="get" action="index.php">
  <fieldset>
    <legend>Creer des voitures :</legend>
    <?php
    foreach ($tab_v as $v)
    $immatriculation = htmlspecialchars($v->getImmatriculation());
    $couleur = htmlspecialchars($v->getCouleur());
    $marque = htmlspecialchars($v->getMarque());
    ?>

    <p>
      <input type='hidden' name='action' value='updated'>
      <label for="immat_id">Immatriculation</label> :
      <input type="text" readonly value=  "<?php echo $immatriculation ?>" name="immatriculation" id="immat_id" required/>
      <label for="marque_id">Marque</label> :
      <input type="text" value= "<?php echo $marque ?>" name="marque" id="marque_id" required/>
      <label for="couleur_id">couleur</label> :
      <input type="text" value= "<?php echo $couleur ?>" name="couleur" id="couleur_id" required/>
      
    </p>
    <p>
      <input type="submit" value="Envoyer" />
    </p>
  </fieldset> 
</form>
