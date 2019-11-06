
<?php
foreach ($tab_v as $v)
    $detail = htmlspecialchars('Voiture d\'immatriculation  ' . $v->getImmatriculation() . 
       '  De couleur  ' . $v->getCouleur() . 
       '  De marque  ' . $v->getMarque());
echo '<p>'.$detail.'</p>';
echo '<a href='. '"./index.php?action=delete&immatriculation='. $v->getImmatriculation() . '".>Supprimer cette Voiture</a>';
echo '<a href='. '"./index.php?action=update&immatriculation=' . $v->getImmatriculation() . '".>    Modifier cette voiture </a>';

?>
