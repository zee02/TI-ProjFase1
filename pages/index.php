<?php
session_start();

// Variáveis dos utilizadores
$invalido = null;
$username_admin = "admin";
$password_admin = "admin";
$username_worker = "worker";
$password_worker = "worker";
$username_analist = "analist";
$password_analist = "analist";

// Sistema de login
if (isset($_POST['username']) && isset($_POST['password'])) {
    if ($_POST['username'] == $username_admin && $_POST['password'] == $password_admin) {
        echo "Login com sucesso..." . "<br>";
        $_SESSION["username"] = $_POST['username'];
        $_SESSION['user_type'] = 'admin'; // Define o tipo de user como 'admin'
        $_SESSION['token'] = gerarTokenAcesso(); // Gera um token de acesso
        header('Location: dashboard.php');
    } elseif ($_POST['username'] == $username_worker && $_POST['password'] == $password_worker) {
        echo "Login com sucesso..." . "<br>";
        $_SESSION["username"] = $_POST['username'];
        $_SESSION['user_type'] = 'worker'; // Define o tipo de usuário como 'worker'
        header('Location: dashboard.php');
    } elseif ($_POST['username'] == $username_analist && $_POST['password'] == $password_analist) {
        echo "Login com sucesso..." . "<br>";
        $_SESSION["username"] = $_POST['username'];
        $_SESSION['user_type'] = 'analist'; // Define o tipo de user como 'analist'
        header('Location: historico.php');
    } else {
        $invalido = "Login inválido...";
    }
} else {
    $inserido = "Nada inserido...";
}

// Função para gerar o token de acesso
function gerarTokenAcesso() {
    $header = [
        'typ' => 'JWT',
        'alg' => 'HS256'
    ];

    $payload = [
        'user_type' => $_SESSION['user_type'],
        'username' => $_SESSION['username'],
        'exp' => time() + 3600 // Expira em 1 hora
    ];

    $header_encoded = base64_encode(json_encode($header));
    $payload_encoded = base64_encode(json_encode($payload));
    $signature = hash_hmac('sha256', $header_encoded . '.' . $payload_encoded, 'chave_secreta');

    $token = $header_encoded . '.' . $payload_encoded . '.' . $signature;

    return $token;
}

// Sistema de permissões
if (isset($_SESSION['user_type'])) {
    $userType = $_SESSION['user_type'];

    // Verificar o tipo de usuário
    if ($userType === 'worker') {
        // Redirecionar para dashboard.php
        header('Location: dashboard.php');
        exit;
    } elseif ($userType === 'analist') {
        // Redirecionar para historico.php ou estatisticas.php
        header('Location: estatisticas.php');
        exit;
    } elseif ($userType === 'admin') {
        // Redirecionar para dashboard.php ou qualquer outra página com permissões totais
        header('Location: dashboard.php');
        exit;
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Supermercado inteligente">
    <meta name="authors" content="João Bettencourt e José Fernandes">
    <title>Login Inteligente</title>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
        integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link href="../css/style.css" rel="stylesheet">
    <link rel="icon" href="../images/logo.png">
</head>

<body>
    <!--FORNULÁRIO DE LOGIN-->
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="../images/logo.png" class="brand_logo" alt="Logo">
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form method="post">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" id="username" name="username" class="form-control input_user" value=""
                                placeholder="username">
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" id="password" name="password" class="form-control input_pass"
                                value="" placeholder="password">
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customControlInline">
                                <?php
                                if ($invalido != null) {
                                    echo $invalido;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-3 login_container">
                            <button type="submit" name="button" class="btn login_btn">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>