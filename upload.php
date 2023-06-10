<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['imagem'])) {
        print_r($_FILES['imagem']);

        $destino = 'images/webcam.jpg';
        $caminho_temporario = $_FILES['imagem']['tmp_name'];

        if (move_uploaded_file($caminho_temporario, $destino)) {
            echo "O arquivo foi movido com sucesso para $destino.";
        } else {
            echo "Erro ao mover o arquivo para $destino.";
        }
    } else {
        echo "Erro: O elemento 'imagem' não foi encontrado.";
    }
} else {
    echo "Erro: O método de requisição não é POST.";
}
?>