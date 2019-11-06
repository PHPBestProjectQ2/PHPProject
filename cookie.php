<?php

setcookie("TestCookie","54",time()+3600);
setcookie("TestCookie","",time()-1);
setcookie("Test2","Saluuut",time()+3600);
echo $_COOKIE['Test2'];
$var = ['1','2','3'];
print_r($var);
setcookie("Test3",serialize($var),time()+3600);
$varRecup = unserialize($_COOKIE['Test3']);
print_r($varRecup);
?>