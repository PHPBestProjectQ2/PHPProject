
<?php
echo '<div style="border:1px solid black;padding:10%;text-align:center;">';
foreach ($tab_v as $v)
    echo '<a href=http://webinfo.iutmontp.univ-montp2.fr/~cadarsir/PHP/TD7/index.php?action=read&immat='. rawurlencode($v->getImmatriculation()). '>Voiture d\'immatriculation ' . $v->getImmatriculation() . '.</a><br>';
echo '</div>';
?>
