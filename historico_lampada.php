<?php
//Verifica se a sessão está desligada e, se estiver, liga a mesma
if (session_status() == PHP_SESSION_DISABLED) {
    session_start();
}
include('connection.php');
include('api/api.php');

$query = "select * from lampada";
$result = mysqli_query($con, $query);
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
    <?php include 'nav.php';
     while($rows=$result->fetch_assoc())
     {
    ?>
        <!--TABELA COM INFORMAÇÃO DO SENSOR DE TEMPERATURA-->
        <div class="card" style="margin-top: 20px">
            <div class="card-header borda">
                <b><?php echo "<td>" . $rows["nome"] . "</td>" ?></b>
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
                            $values = explode(';', $rows["log"]);
                            echo "<tr>";
                            echo "<td>" . $values[0] . "</td>";
                            if($values[1] == 1){
                                echo "<td>" . "Luz com pouca intensidade..."  . "</td>";
                            } elseif($values[1] == 2){
                                echo "<td>" . "Luz com muita intensidade"  . "</td>";
                            }else{
                                echo "<td>" . "Luz desligada"  . "</td>";
                            }
                            echo "</tr>";
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
<?php 
}
?>