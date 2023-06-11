<?php
session_start();
//Verifica se a sessão está desligada e, se estiver, liga a mesma
if (session_status() == PHP_SESSION_DISABLED) {
  session_start();
}
if ($_SESSION['username'] != 'admin' && $_SESSION['username'] != 'analist') {
  die("Acesso restrito.");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  header('Cache-Control: no-cache, no-store, must-revalidate');
  header('Pragma: no-cache');
  header('Expires: 0');
  ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página de Estatísticas</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/startbootstrap-sb-admin-2@4.1.4/dist/css/sb-admin-2.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="../css/style.css" rel="stylesheet">
  <style>
    .card-img-icon {
      width: 20px;
      height: 20px;
      object-fit: contain;
    }
  </style>
</head>

<body id="page-top">
  <div id="wrapper">
    <?php include('nav.php'); ?>
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6 mb-4">
              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                  <h6 class="m-0 font-weight-bold text-primary">Gráfico de Humidade</h6>
                  <img src="../images/humidade.png" alt="Imagem Humidade" class="card-img-right card-img-icon">
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="chartHumidade"></canvas>
                  </div>
                </div>
              </div>
              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                  <h6 class="m-0 font-weight-bold text-primary">Contador de Ativações - Alarme</h6>
                  <img src="../images/alarme_on.png" alt="Imagem Alarme" class="card-img-right card-img-icon">
                </div>
                <div class="card-body">
                  <p id="counterAlarme"></p>
                </div>
              </div>
            </div>
            <div class="col-lg-6 mb-4">
              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                  <h6 class="m-0 font-weight-bold text-primary">Gráfico de Temperatura</h6>
                  <img src="../images/temperatura.png" alt="Imagem Temperatura" class="card-img-right card-img-icon">
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="chartTemperatura"></canvas>
                  </div>
                </div>
              </div>
              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                  <h6 class="m-0 font-weight-bold text-primary">Contador de Ativações - Porta</h6>
                  <img src="../images/open_door.png" alt="Imagem Porta" class="card-img-right card-img-icon">
                </div>
                <div class="card-body">
                  <p id="counterPorta"></p>
                </div>
              </div>
              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                  <h6 class="m-0 font-weight-bold text-primary">Contador de Ativações - Webcam</h6>
                  <img src="../images/webcam.png" alt="Imagem Webcam" class="card-img-right card-img-icon">
                </div>
                <div class="card-body">
                  <p id="counterWebcam"></p>
                </div>
                <div class="card shadow mb-4">
                  <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Gráfico de Temperatura</h6>
                    <img src="../images/temperatura.png" alt="Imagem Temperatura" class="card-img-right card-img-icon">
                  </div>
                  <div class="card-body">
                    <div class="chart-area">
                      <canvas id="chartTemperatura"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="../js/script.js"></script>
</body>

</html>