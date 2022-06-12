<?php
#Verifica se o utilizador está a aceder à dashboard com sessão iniciada
session_start();
include('connection.php');
include('api/api.php');

$query = "select permission_level from user where username = '{$_SESSION['username']}'";
$result = mysqli_query($con, $query);
$levelperm = mysqli_fetch_assoc($result);

if ($levelperm['permission_level'] != 1) {
    header("refresh: 3;url=index.php");
    die("Acesso restrito.");
}

$query_temperatura = "select * from temperatura ORDER BY id DESC LIMIT 1";
$result = $con->query($query_temperatura);
$row_temperatura = $result->fetch_array(MYSQLI_ASSOC);

$query_humidade = "select * from humidade ORDER BY id DESC LIMIT 1";
$result = $con->query($query_humidade);
$row_humidade = $result->fetch_array(MYSQLI_ASSOC);

$query_luminosidade = "select * from luminosidade ORDER BY id DESC LIMIT 1";
$result = $con->query($query_luminosidade);
$row_luminosidade = $result->fetch_array(MYSQLI_ASSOC);

//$query_movimento = "select * from movimento ORDER BY id DESC LIMIT 1";
//$result = $con->query($query_movimento);
//$row_movimento = $result->fetch_array(MYSQLI_ASSOC);


$query_porta = "select * from porta ORDER BY id DESC LIMIT 1";
$result = $con->query($query_porta);
$row_porta  = $result->fetch_array(MYSQLI_ASSOC);

$query_lampada = "select * from lampada ORDER BY id DESC LIMIT 1";
$result = $con->query($query_lampada);
$row_lampada = $result->fetch_array(MYSQLI_ASSOC);

$query_incendio = "select * from incendio ORDER BY id DESC LIMIT 1";
$result = $con->query($query_incendio);
$row_incendio = $result->fetch_array(MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Plataforma IoT</title>
    <link href="css/style.css" rel="stylesheet">
    <!-- <meta http-equiv="refresh" content="5"> -->
</head>

<style>
    .img {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .float-container {
        border: 3px solid #fff;
        padding: 10px;
    }

    .float-child {
        width: 50%;
        float: left;
        padding: 1px;
    }
</style>

<head>
    <style>
        #historico{
            color: orange;
        }
    </style>
</head>

<body>

    <?php include 'nav.php'; ?>

    <!--SERVIDOR IOT CABECALHO-->
    <div class="container">
        <div class="card" style="width:auto">
            <div class="card-body" class="float-container" position="in" style="display:inline">
                <div class="float-child">
                    <h1 class="card-title">Servidor IoT</h1>
                    <p class="card-text">Bem vindo <b><?php echo $_SESSION['username']?></b></p>
                    <p style="font-size:small">Tecnologias da Internet - Engenharia Informática</p>
                </div>
                <div class="float-child" style="display:inline">
                    <img src="images/estg.png" class="float-end" alt="ESTG" width="300px">
                </div>
            </div>
        </div>
    </div><br>

    <!--3 PAINEIS DE CONTROLO-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header" style="text-align: center;"><b><?php echo $row_luminosidade["nome"]. ": " . $row_luminosidade["valor"]. "%" ?></b></div>
                    <div class="card-body">
                        <img src="images/dia.png" alt="humidade" class="img">
                    </div>
                    <div class="card-footer" style="text-align: center;">Atualização: <?php echo $row_luminosidade["hora"]?> - <a id="historico" href="historico_luminosidade.php">Histórico</a></div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header" style="text-align: center;"><b> <?php echo $row_temperatura["nome"] . ": " . $row_temperatura["valor"] . "º" ?></b></div>
                    <div class="card-body">
                        <img src="images/temperature.png" alt="humidade" class="img">
                    </div>
                    <div class="card-footer" style="text-align: center;">Atualização: <?php echo $row_temperatura["hora"] ?> - <a id="historico" href="historico_temperatura.php">Histórico</a></div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header" style="text-align: center;"><b> <?php echo $row_humidade["nome"] . ": " . $row_humidade["valor"] . "%" ?></b></div>
                    <div class="card-body">
                        <img src="images/humidity.png" alt="humidade" class="img">
                    </div>
                    <div class="card-footer" style="text-align: center;">Atualização: <?php echo $row_humidade["hora"] ?> - <a id="historico" href="historico_humidade.php">Histórico</a></div>
                </div>
            </div>
            <div class="col-sm-4" style="padding-top:20px">
                <div class="card">
                    <?php
                    if ($row_porta["valor"] == "1,0") {
                    ?>
                        <div class="card-header" style="text-align: center;"><b>Porta: Aberta </b></div>
                        <div class="card-body">
                            <img src="images/open_door.png" alt="Porta" class="img">
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="card-header" style="text-align: center;"><b>Porta: Fechada </b></div>
                        <div class="card-body">
                            <img src="images/closed_door.png" alt="porta" class="img">
                        </div>
                    <?php
                    }
                    ?>
                    <div class="card-footer" style="text-align: center;">Atualização: <?php echo $row_porta["hora"] ?> - <a id="historico" href="historico_porta.php">Histórico</a></div>
                </div>
            </div>
            <div class="col-sm-4" style="padding-top:20px">
                <div class="card">
                    <?php
                    if ($row_incendio["valor"] == 1) {
                    ?>
                        <div class="card-header" style="text-align: center;"><b>Incendio: Detetado </b></div>
                        <div class="card-body">
                            <img src="images/fogo.png" alt="incendio" class="img">
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="card-header" style="text-align: center;"><b>Incendio: Não detetado </b></div>
                        <div class="card-body">
                            <img src="images/fogo.png" alt="incendio" class="img">
                        </div>
                    <?php
                    }
                    ?>
                    <div class="card-footer" style="text-align: center;">Atualização: <?php echo $row_incendio["hora"] ?> - <a id="historico" href=”#”>Histórico</a></div>
                </div>
            </div>
            <div class="col-sm-4" style="padding-top:20px">
                <div class="card">
                    <?php
                    if ($row_lampada["valor"] == 1) {
                    ?>
                        <div class="card-header" style="text-align: center;"><b>Estado da Lampada: Pouca intensidade </b></div>
                        <div class="card-body">
                            <img src="images/led_on.png" alt="Lampada Ligada" class="img">
                        </div>
                    <?php
                    } else if($row_lampada["valor"] == 2) {
                    ?>
                        <div class="card-header" style="text-align: center;"><b>Estado da Lampada: Muita intensidade </b></div>
                        <div class="card-body">
                            <img src="images/led_on.png" alt="Lampada Ligada" class="img">
                        </div>
                    <?php
                    }else{
                        ?>
                        <div class="card-header" style="text-align: center;"><b>Estado da Lampada: Desligada </b></div>
                        <div class="card-body">
                            <img src="images/led_off.png" alt="Lampada Desligada" class="img">
                        </div>
                    <?php  
                        }
                    ?>
                    <div class="card-footer" style="text-align: center;">Atualização: <?php echo $row_lampada["hora"] ?> - <a id="historico" href=”#”>Histórico</a></div>
                </div>
            </div>


            <div class="col-sm-4" style="padding-top:20px">
                <div class="card">
                    <div class="card-header" style="text-align: center;"><b>WebCam</b></div>
                    <div class="card-body">
                         <img src='images/webcam.jpg?id=".time()."' alt="webcam" id="webcam" style="width: 230px;"  class="img">
                    </div>
                    <div class="card-footer" style="text-align: center;">Atualização: <?php echo $row_lampada["hora"] ?> - <a id="historico" href=”#”>Histórico</a></div>
                </div>
            </div>
        </div>
    </div>
    <br>

    <!--TABELA DE INFORMAÇÃO-->
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Tipo de Dispositivo IoT</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Data de Atualização</th>
                    <th scope="col">Estado Alertas</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $row_temperatura["nome"]?></td>
                    <td><?php echo $row_temperatura["valor"] . "º" ?></td>
                    <td><?php echo $row_temperatura["hora"] ?></td>
                    <td><span class="badge rounded-pill bg-danger">Desativo</span></td>
                </tr>
                <tr>
                    <td><?php echo $row_humidade["nome"]?></td>
                    <td><?php echo $row_humidade["valor"]?>%</td>
                    <td><?php echo $row_humidade["hora"]?></td>
                    <td><span class="badge rounded-pill bg-warning text-dark">Warning</span></td>
                </tr>
                <tr>
                    <td><?php echo $row_luminosidade["nome"]?></td>
                    <td><?php echo $row_luminosidade["valor"]?>%</td>
                    <td><?php echo $row_luminosidade["hora"]?></td>
                    <td><span class="badge rounded-pill bg-danger">Muito Forte</span></td>
                </tr>
            </tbody>
        </table>
    </div>


</body>

</html>