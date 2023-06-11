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
    <style>
        .gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .gallery-row {
            display: table-row;
        }

        .gallery-cell {
            display: table-cell;
            text-align: center;
            padding: 10px;
        }

        .gallery-cell img {
            width: 200px;
            height: 200px;
        }
    </style>
</head>
<body>
    <?php include 'nav.php'; ?>
    
    <div class="gallery">
        <?php
        // Diretório onde estão as imagens
        $diretorio = '../images/camImages';

        // Obtém todas as imagens do diretório
        $imagens = glob($diretorio . '/*.jpg');

         // Exibe as imagens na galeria
        foreach ($imagens as $imagem) {
            echo '<div class="gallery-row">';
            echo '<div class="gallery-cell">';
            echo '<img src="' . $imagem . '" alt="Imagem">';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>

</body>
</html>