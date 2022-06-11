<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_FILES['imagem'])) {
        // echo ($_FILES['imagem']['name']);
        // echo ($_FILES['imagem']['size']);
        // echo ($_FILES['imagem']['type']);
        upload();
    } else {
        echo "Não existe nenhum elemento com este nome";
    }
} else {
    echo "metodo errado";
}

function upload()
{
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["imagem"]["name"]);
    move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file);
}
