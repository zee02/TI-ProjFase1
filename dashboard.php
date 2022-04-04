<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
} else {
    if (!isset($_SESSION['username'])) {
        header("refresh: 5;url=index.php");
        die("Acesso restrito.");
    }
}
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

?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Supermercado inteligente">
    <meta name="authors" content="Gonçalo Pestana e José Fernandes">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="css\style.css" rel="stylesheet">
    <title>Supermercado Inteligente</title>
</head>


<body>

    <?php include 'nav.php' ?>


    <!--Lista de Sensores-->


    <div class="container">
        <div class="row" style="text-align: center;">
            <div class="col-sm-4">
                <div class="card-header borda">
                    <b>Humidade: </b>
                </div>

                <div class="card-body borda">
                    <img src="images/dia.png" alt="Luminosidade">
                </div>
            </div>


            <div class="col-sm-4">
                <div class="card-header borda">
                    <b>Temperatura: </b>
                </div>
                <div class="card-body borda">
                    <img src="images/temperatura.png" alt="Temperatura">
                </div>
            </div>



            <div class="col-sm-4">
                <div class="card-header borda">
                    <b>Porta: </b>
                </div>

                <div class="card-body borda">
                    <img src="images/porta.png" alt="Porta">
                </div>
            </div>
        </div>

        <!--Tabela-->

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
                            <td><span class="badge rounded-pill bg-success">Ativo</span></td>
                        </tr>
                        <tr>
                            <td><?php echo $nome_humidade ?></td>
                            <td><?php echo $valor_humidade . "%" ?></td>
                            <td><?php echo $hora_humidade ?></td>
                            <td><span class="badge rounded-pill bg-warning text-dark">Warning</span></td>
                        </tr>
                        <tr>
                            <td><?php echo $nome_porta ?></td>
                            <td><?php echo $valor_porta . " pessoas" ?></td>
                            <td><?php echo $hora_porta ?></td>
                            <td><span class="badge rounded-pill bg-danger">Muito Forte</span></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>