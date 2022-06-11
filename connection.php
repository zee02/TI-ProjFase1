<?php      
    $host = "127.0.0.1";  
    $user = "root";  
    $password = "rootroot";  
    $db_name = "projeto";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(!$con) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
?>