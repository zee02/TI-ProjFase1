<?php
#Verifica se o utilizador está a aceder à dashboard com sessão iniciada
session_start();
if (!isset($_SESSION['username'])) {
    header("refresh: 5;url=index.php");
    die("Acesso restrito.");
}

//Buscar os valores pretendidos dos ficheiros txt
$valor_temperatura = file_get_contents("../api/files/temperatura/valor.txt");
$hora_temperatura = file_get_contents("../api/files/temperatura/hora.txt");
$nome_temperatura = file_get_contents("../api/files/temperatura/nome.txt");

$valor_alarme = file_get_contents("../api/files/alarme/valor.txt");
$hora_alarme = file_get_contents("../api/files/alarme/hora.txt");
$nome_alarme = file_get_contents("../api/files/alarme/nome.txt");


$valor_porta = file_get_contents("../api/files/porta/valor.txt");
$hora_porta = file_get_contents("../api/files/porta/hora.txt");
$nome_porta = file_get_contents("../api/files/porta/nome.txt");

$valor_humidade = file_get_contents("../api/files/humidade/valor.txt");
$hora_humidade = file_get_contents("../api/files/humidade/hora.txt");
$nome_humidade = file_get_contents("../api/files/humidade/nome.txt");

$valor_webcam = file_get_contents("../api/files/webcam/valor.txt");
$hora_webcam  = file_get_contents("../api/files/webcam/hora.txt");
$nome_webcam  = file_get_contents("../api/files/webcam/nome.txt");


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="authors" content="João Bettencourt e José Fernandes">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../css/style.css" rel="stylesheet">
    <link rel="icon" href="../images/logo.png">
    <title>Histórico</title>
</head>

<body>

    <?php include 'nav.php' ?>

    <!--Lista de Sensores-->
    <div class="container">
        <div class="row" style="text-align: center;">

            <div class="col-sm-4" style="padding-top:20px">
                <div class="card">
                    <?php
                    if ($valor_porta == 1) {
                    ?>
                        <div class="card-header borda">
                            <b>Porta: Aberta</b>
                        </div>
                        <div class="card-body borda">
                            <img src="../images/open_door.png" alt="Porta">
                        </div>
                        <div class="card-footer" style="text-align: center;">Atualização:
                            <?php echo $hora_porta ?> - <a id="historico" href="../pages/historico.php">Histórico</a></div>
                    <?php
                    } else {
                    ?>
                        <div class="card-header borda">
                            <b>Porta: Fechada</b>
                        </div>
                        <div class="card-body borda">
                            <img src="../images/closed_door.png" alt="Porta">
                        </div>
                        <div class="card-footer" style="text-align: center;">Atualização:
                            <?php echo $hora_porta ?> - <a id="historico" href="../pages/historico.php">Histórico</a></div>
                    <?php
                    }
                    ?>
                </div>
            </div>



            <div class="col-sm-4" style="padding-top:20px">
                <div class="card">
                    <div class="card-header borda">
                        <b>Temperatura: <?php echo $valor_temperatura . "º"; ?></b>
                    </div>
                    <div class="card-body borda">
                        <img src="../images/temperatura.png" alt="Temperatura">
                    </div>
                    <div class="card-footer" style="text-align: center;">Atualização:
                        <?php echo $hora_temperatura ?> - <a id="historico" href="../pages/historico.php">Histórico</a>
                    </div>
                </div>
            </div>


            <div class="col-sm-4" style="padding-top:20px">
                <div class="card">
                    <div class="card-header borda">
                        <b>Humidade: <?php echo $valor_humidade; ?></b>
                    </div>
                    <div class="card-body borda">
                        <img src="../images/humidade.png" alt="Temperatura">
                    </div>
                    <div class="card-footer" style="text-align: center;">Atualização:
                        <?php echo $hora_humidade ?> - <a id="historico" href="../pages/historico.php">Histórico</a>
                    </div>
                </div>
            </div>


            <div class="col-sm-4" style="padding-top:20px">
                <div class="card">
                    <?php
                    if ($valor_alarme == 1) {
                    ?>
                        <div class="card-header borda">
                            <b>Alarme: Ligado</b>
                        </div>
                        <div class="card-body borda">
                            <img src="../images/alarme_on.png" alt="Alarme">
                        </div>
                        <div class="card-footer" style="text-align: center;">Atualização:
                            <?php echo $hora_alarme ?> - <a id="historico" href="../pages/historico.php">Histórico</a>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="card-header borda">
                            <b>Alarme: Desligado</b>
                        </div>
                        <div class="card-body borda">
                            <img src="../images/alarme_off.png" alt="Alarme">
                        </div>
                        <div class="card-footer" style="text-align: center;">Atualização:
                            <?php echo $hora_alarme ?> - <a id="historico" href="../pages/historico.php">Histórico</a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-sm-4" style="padding-top:20px">
                <div class="card">
                    <div class="card-header borda">
                        <b>Imagem</b>
                    </div>
                    <div class="card-body borda">
                        <?php echo "<img src='../images/webcam.jpg?id=" . time() . "' style='width:45%'>"; ?>
                    </div>
                    <div class="card-footer" style="text-align: center;">Atualização:
                        <?php echo $hora_webcam ?> - <a id="historico" href="../pages/historico.php">Histórico</a>
                    </div>
                    <div class="card-footer" style="text-align: center;">
                        <button onclick="executarCaptura()">Capturar Imagem</button>
                    </div>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                function executarCaptura() {
                    $.ajax({
                        url: 'captura.php',
                        method: 'POST',
                        success: function() {
                            console.log('Comando executado com sucesso!');
                        },
                        error: function(xhr, status, error) {
                            console.error('Ocorreu um erro ao executar o comando:', error);
                        }
                    });
                }
            </script>


        </div>

        <!--Tabela de sensores-->

        <div class="card" style="margin-top: 20px">
            <div class="card-header borda">
                <b>Tabela de sensores</b>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <b>Tipo de Sensor</b>
                                </th>
                                <th>
                                    <b>Valor</b>
                                </th>

                                <th>
                                    <b>Data de atualização</b>
                                </th>

                                <th>
                                    <b>Estado Alertas</b>
                                </th>
                            </tr>
                        </thead>

                        <tr>

                            <td><?php echo $nome_temperatura ?></td>
                            <td><?php echo $valor_temperatura . "º" ?></td>
                            <td><?php echo $hora_temperatura ?></td>
                            <?php
                            if ($valor_temperatura == 0) {
                            ?>
                                <td><span class="badge rounded-pill bg-danger">Desativo</span></td>
                            <?php
                            } elseif ($valor_temperatura > 0 &&  $valor_temperatura < 50 ||  $valor_temperatura < 0) {
                            ?>
                                <td><span class="badge rounded-pill bg-warning text-dark">Warning</span></td>
                            <?php
                            } else {
                            ?>
                                <td><span class="badge rounded-pill bg-danger">Muito Alta</span></td>
                            <?php
                            }
                            ?>
                        </tr>


                        <tr>

                            <td><?php echo $nome_humidade ?></td>
                            <td><?php echo $valor_humidade . "%" ?></td>
                            <td><?php echo $hora_humidade ?></td>
                            <?php
                            if ($valor_humidade == 0) {
                            ?>
                                <td><span class="badge rounded-pill bg-danger">Desativo</span></td>
                            <?php
                            } elseif ($valor_humidade > 0 &&  $valor_humidade < 40 ||  $valor_humidade < 0) {
                            ?>
                                <td><span class="badge rounded-pill bg-warning text-dark">Warning</span></td>
                            <?php
                            } else {
                            ?>
                                <td><span class="badge rounded-pill bg-danger">Muito Alta</span></td>
                            <?php
                            }
                            ?>
                        </tr>

                        <tr>
                            <td><?php echo $nome_alarme ?></td>
                            <td><?php echo $valor_alarme ?></td>
                            <td><?php echo $hora_alarme ?></td>
                            <?php
                            if ($valor_alarme == 0) {
                            ?>
                                <td><span class="badge rounded-pill bg-warning">Desligado</span></td>
                            <?php
                            } else {
                            ?>
                                <td><span class="badge rounded-pill bg-success">Ligado</span></td>
                            <?php
                            }
                            ?>
                        </tr>

                        <tr>
                            <td><?php echo $nome_porta ?></td>
                            <td><?php echo $valor_porta ?></td>
                            <td><?php echo $hora_porta ?></td>
                            <?php
                            if ($valor_porta == 0) {
                            ?>
                                <td><span class="badge rounded-pill bg-danger">Fechada</span></td>
                            <?php
                            } else {
                            ?>
                                <td><span class="badge rounded-pill bg-success">Aberta</span></td>
                            <?php
                            }
                            ?>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>