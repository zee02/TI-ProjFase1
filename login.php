<?php 
session_start();
$username_admin = "admin";
$password_admin = "admin";

$username_worker = "worker";
$password_worker = "worker";

if (isset($_POST['username']) && isset($_POST['password'])) {
    if ($_POST['username'] == $username_admin && $_POST['password'] == $password_admin || $_POST['username'] == $username_worker && $_POST['password'] == $password_worker) {
        echo "Login com sucesso..." . "<br>";
        $_SESSION["username"]=$_POST['username'];
        header('Location: dashboard.php');
    } else {
        $invalido = "Login invalido...";
    }
} else {
    $inserido= "Nada inserido...";
}
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="style.css" rel="stylesheet">
<!DOCTYPE html>
<html>

<head>
    <title>Login Inteligente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>

<body>
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="images/logo.png" class="brand_logo" alt="Logo">
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form method="post">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" id="username" name="username" class="form-control input_user" value="" placeholder="username">
                        </div>
                        <div class="input-group mb-2">  
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" id="password" name="password" class="form-control input_pass" value="" placeholder="password">
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customControlInline">
                                <?php echo $invalido ?>
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