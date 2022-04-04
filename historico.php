<?php
include 'nav.php';
session_start();
if (!isset($_SESSION['username'])) {
    header("refresh:5;url=index.php");
    die("Acesso restrito.");
}

//Logs para os sensores
$get_logs_temp = file_get_contents("api/files/temperatura/log.txt");
$get_logs_humidade = file_get_contents("api/files/humidade/log.txt");
$get_logs_porta = file_get_contents("api/files/porta/log.txt");


//Buscar os valores pretendidos dos ficheiros txt
$valor_temperatura = file_get_contents("api/files/temperatura/valor.txt");
$hora_temperatura = file_get_contents("api/files/temperatura/hora.txt");
$nome_temperatura = file_get_contents("api/files/temperatura/nome.txt");

$valor_humidade = file_get_contents("api/files/humidade/valor.txt");
$hora_humidade = file_get_contents("api/files/humidade/hora.txt");
$nome_humidade = file_get_contents("api/files/humidade/nome.txt");


$valor_porta = file_get_contents("api/files/porta/valor.txt");
$hora_porta = file_get_contents("api/files/porta/hora.txt");
$nome_porta = file_get_contents("api/files/porta/nome.txt");


//Separa os espaços e dá pop do ultimo caracter do vetor
$get_logs_temp = explode("\n", $get_logs_temp);
array_pop($get_logs_temp);

$get_logs_humidade = explode("\n", $get_logs_humidade);
array_pop($get_logs_humidade);

$get_logs_porta = explode("\n", $get_logs_porta);
array_pop($get_logs_porta);

?>

<!--TABELA DE INFORMAÇÃO-->
<div class="container">
    <table class="table">
        <thead>
            <tr>

                <th scope="col">Tipo de Sensor</th>
                <th scope="col">Data de Medição</th>
                <th scope="col">Valor</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($get_logs_humidade as $gh) {
                $gh = explode(';', $gh);
                echo "<tr>";
                echo "<td>" . $nome_humidade . "</td>";
                echo "<td>" . $gh[0] . "</td>";
                echo "<td>" . $gh[1] . "º" . "</td>";
                echo "</tr>";
            }
            ?>
            <?php
            foreach ($get_logs_temp as $gt) {
                $gt = explode(';', $gt);
                echo "<tr>";
                echo "<td>" . $nome_temperatura . "</td>";
                echo "<td>" . $gt[0] . "</td>";
                echo "<td>" . $gt[1] . "º" . "</td>";
                echo "</tr>";
            }
            ?>
            <?php
            foreach ($get_logs_porta as $gp) {
                $gp = explode(';', $gp);
                echo "<tr>";
                echo "<td>" . $nome_porta . "</td>";
                echo "<td>" . $gp[0] . "</td>";
                echo "<td>" . $gp[1] . "º" . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>