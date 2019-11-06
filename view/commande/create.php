
<form method="get" action="../../index.php">
  <fieldset>
    <legend>Creer des voitures :</legend>
    <p>
      <input type='hidden' name='action' value='create'>
      <label for="immat_id">Immatriculation</label> :
      <input type="text" placeholder="Ex : 256AB34" name="immatriculation" id="immat_id" required/>
      <label for="marque_id">Marque</label> :
      <input type="text" placeholder="Ex : Toyoya" name="marque" id="marque_id" required/>
      <label for="couleur_id">couleur</label> :
      <input type="text" placeholder="Ex : Vert" name="couleur" id="couleur_id" required/>
      
    </p>
    <p>
      <input type="submit" value="Envoyer" />
    </p>
  </fieldset> 
</form>
