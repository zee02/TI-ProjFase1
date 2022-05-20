<?php 
session_start();
include('connection.php');  
if(empty($_POST['username']) || empty($_POST['password'])){
    header('Location: index.php');
    exit();
}

$user = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);


$query = "select * from user where username = '{$user}' and password = '{$password}'";

$result = mysqli_query($con, $query);

$row = mysqli_num_rows($result);

if($row == 1){
    $_SESSION['username'] = $user;
    header('Location: dashboard.php');
    exit();
}else {
    header('Location: login.php');
    $_SESSION['not_auth'] = true;
    exit();
}
?>