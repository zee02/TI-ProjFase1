<?php
//Verifica se a sessão está desligada e, se estiver, liga a mesma
if (session_status() == PHP_SESSION_DISABLED) {
    session_start();
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

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="authors" content="Gonçalo Pestana e José Fernandes">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" href="images/logo.png">
    <title>Histórico</title>
</head>

<body>
    <?php include 'nav.php'; ?>

    <!--TABELA COM INFORMAÇÃO DO SENSOR DE HUMIDADE-->
    <div class="container">
        <div class="card" style="margin-top: 20px">
            <div class="card-header borda">
                <b><?php echo "<td>" . $nome_humidade . "</td>" ?></b>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <b>Data de Medição</b>
                                </th>

                                <th>
                                    <b>Valor</b>
                                </th>
                            </tr>
                        </thead>

                        <?php
                        //Por cada log da humidade que encontra no ficheiro
                        foreach ($get_logs_humidade as $gh) {
                            //Separa as frases onde se encontra o ;
                            $gh = explode(';', $gh);
                            echo "<tr>";
                            echo "<td>" . $gh[0] . "</td>";
                            echo "<td>" . $gh[1] . "º" . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>

        <!--TABELA COM INFORMAÇÃO DO SENSOR DE TEMPERATURA-->
        <div class="card" style="margin-top: 20px">
            <div class="card-header borda">
                <b><?php echo "<td>" . $nome_temperatura . "</td>" ?></b>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <b>Data de Medição</b>
                                </th>

                                <th>
                                    <b>Valor</b>
                                </th>
                            </tr>
                        </thead>

                        <?php
                        //Por cada log de temperatura que encontra no ficheiro
                        foreach ($get_logs_temp as $gh) {
                            //Separa as frases onde se encontra o ;
                            $gh = explode(';', $gh);
                            echo "<tr>";
                            echo "<td>" . $gh[0] . "</td>";
                            echo "<td>" . $gh[1] . "º" . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>

        <!--TABELA COM INFORMAÇÃO DO SENSOR DE ENTRADA-->
        <div class="card" style="margin-top: 20px">
            <div class="card-header borda">
                <b><?php echo "<td>" . $nome_porta . "</td>" ?></b>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <b>Data de Medição</b>
                                </th>

                                <th>
                                    <b>Valor</b>
                                </th>
                            </tr>
                        </thead>
                        <?php
                        //Por cada log da porta que encontra no ficheiro
                        foreach ($get_logs_porta as $gh) {
                            //Separa as frases onde se encontra o ;
                            $gh = explode(';', $gh);
                            echo "<tr>";
                            echo "<td>" . $gh[0] . "</td>";
                            echo "<td>" . $gh[1] . " pessoas" . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>