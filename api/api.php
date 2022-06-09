<?php
header('Content-Type: text/html; charset=utf-8');

$host = "localhost";  
$user = "root";  
$password = '';  
$db_name = "projeto";  
  
$con = mysqli_connect($host, $user, $password, $db_name);  
if(mysqli_connect_errno()) {  
    die("Failed to connect with MySQL: ". mysqli_connect_error());  
}  

// #Código para Armazenar dados relacionados com o sensor de temperatura em variáveis
// $valor_temperatura = file_get_contents("files/temperatura/valor.txt");
// $hora_temperatura = file_get_contents("files/temperatura/hora.txt");
// $log_temperatura = file_get_contents("files/temperatura/log.txt");
// $nome_temperatura = file_get_contents("files/temperatura/nome.txt");

// #Código para Armazenar dados relacionados com o sensor de humidade em variáveis
// $valor_humidade = file_get_contents("files/humidade/valor.txt");
// $hora_humidade = file_get_contents("files/humidade/hora.txt");
// $log_humidade = file_get_contents("files/humidade/log.txt");
// $nome_humidade = file_get_contents("files/humidade/nome.txt");

// #Código para Armazenar dados relacionados com o sensor de porta em variáveis
// $valor_porta = file_get_contents("files/porta/valor.txt");
// $hora_porta = file_get_contents("files/porta/hora.txt");
// $log_porta = file_get_contents("files/porta/log.txt");
// $nome_porta = file_get_contents("files/porta/nome.txt");

/*
Verifica o método que está a ser utilizado para enviar a informação para o 
servidor e se tudo estiver correto escreve valores enviados pelos sensores em ficheiros.
Senão, irá mostrar uma mensagem de erro.
*/
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    if (isset($_POST["nome"]) && isset($_POST[ "hora"]) && isset($_POST["valor"])) {
       $nome = $_POST["nome"];
       $hora = $_POST["hora"];
       $valor = $_POST["valor"];
       $log = $_POST["hora"] . ";" . $_POST["valor"] . PHP_EOL; FILE_APPEND;

       $query = "insert into {$nome} (hora,valor,log,nome) values ('{$hora}', '{$valor}', '{$log}', '{$nome}')";

       mysqli_query($con, $query);
    } else {
        echo "Erro na API";
    }
 }  elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
     if (isset($_GET["nome"])) {
         $nome = $_GET["nome"];
         $sql = "select * from {$nome} ORDER BY id DESC LIMIT 1"; 
         $query = $con->prepare($sql); 
         $query->execute();
         $result = $query->get_result(); 
         $valor = $result->fetch_assoc();   
         var_dump($valor);
         
     } else {
         http_response_code(404);
     }
 } else {
     echo "metodo errado";
 }
