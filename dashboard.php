<?php 
session_start();
if (!isset($_SESSION['username'])) {
    die("Acesso restrito.");
}
echo "Logado como: ". $_SESSION['username'];
?>