<?php
//Verifica se a sessão está desligada e, se estiver, liga a mesma
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
?>
<style>
    .img-text-size{
        max-width: 20px;
        height: auto;
        margin-right: 5px;
    }
</style>

<body>
    <!--Barra de navegação-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="nav-link" aria-current="page" href="dashboard.php"><img class="logotipo" src="..\images\logo.png"
                    alt="Logotipo do website"></img></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <?php if ($_SESSION['username'] != 'analist') { ?>
                        <a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a>
                    <?php } ?>
                    </li>
                    <li class="nav-item">
                    <?php if ($_SESSION['username'] != 'analist' && $_SESSION['username'] != 'worker') { ?>
                        <a class="nav-link" href="historico.php">Histórico</a>
                    <?php } ?>
                    </li>
                    <li class="nav-item">
                    <?php if ($_SESSION['username'] != 'worker') { ?>
                        <a class="nav-link" href="estatisticas.php">Estatisticas</a>
                    <?php } ?>
                    </li>
                    <li class="nav-item">
                    <?php if ($_SESSION['username'] != 'analist' && $_SESSION['username'] != 'worker') { ?>
                        <a class="nav-link" href="galeria.php">Galeria</a>
                    <?php } ?>
                    </li>
                </ul>
                
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item espaco">
                        <a class="nav-link"><?php echo "Utilizador: " . $_SESSION['username']; ?> 
                        <?php
                            if( $_SESSION['username'] == 'admin'){ ?>
                                <img class="img-text-size" src="../images/admin.png" alt="admin">
                            <?php }
                            if( $_SESSION['username'] == 'worker'){ ?>
                                <img class="img-text-size" src="../images/worker.png" alt="worker">
                            <?php } 
                            if( $_SESSION['username'] == 'analist'){ ?>
                                <img class="img-text-size" src="../images/analist.png" alt="analist">
                            <?php } ?>
                        <img src="images/" alt=""> 
                        </a>
                    </li>

                    <li class="nav-item">
                        <button type="button" class="btn btn-light"><a href="logout.php">Logout</a></button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>