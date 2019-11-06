<?php
$preference =  $_GET['choice'];
setcookie("preference",$preference,time()+3600);
echo "<a href=http://webinfo.iutmontp.univ-montp2.fr/~cadarsir/PHP/TD7/index.php> lien a suivre </a>";