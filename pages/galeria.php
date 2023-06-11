<?php
session_start();
//Verifica se a sessão está desligada e, se estiver, liga a mesma
if (session_status() == PHP_SESSION_DISABLED) {
    session_start();
}

if ($_SESSION['username'] != 'admin'  && $_SESSION['username'] != 'analist') {
    die("Acesso restrito.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria de Fotos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/startbootstrap-sb-admin-2@4.1.4/dist/css/sb-admin-2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../css/style.css" rel="stylesheet">
    <link rel="icon" href="../images/logo.png">
    <style>
    .gallery-item {
      margin-bottom: 30px;
    }

    .gallery-item img {
      width: 100%;
      height: auto;
    }

    .card-header.borda {
      margin-top: 20px;
      padding: 10px;
    }

    .card-header.borda h1.title {
      margin: 0;
    }
    </style>
</head>
<body>
    <?php include 'nav.php'; ?>
    
     <div class="card-header borda">
        <h1 class="title" style="font-size: 24px;">Galeria de Fotos</h1>
    </div>
    <div class="container">
      <div class="row">
        <?php
        $imageDirectory = "../images/camImages";
        $imagePaths = glob($imageDirectory . '/*.jpg', GLOB_BRACE);
        $numOfItems = count($imagePaths);

        foreach ($imagePaths as $imagePath) {
            ?>
            <div class="col-md-4 gallery-item">
                <img src="<?php echo $imagePath; ?>" alt="Imagem">
            </div>  
        <?php
        }
        ?>
       </div>
    </div>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>