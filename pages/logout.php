<?php
#Código para terminar a sessão do utilizador 
session_start();
session_unset();
session_destroy();
header('Location: index.php');
?>

