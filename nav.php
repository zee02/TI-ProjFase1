<?php
//Verifica se a sessão está desligada e, se estiver, liga a mesma
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
?>
<head>
	<link rel="icon" href="images/logo.png">
</head>
<body>
	<!--Barra de navegação-->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<a class="nav-link" aria-current="page" href="dashboard.php"><img class="logotipo" src="images/logo.png" alt="Logotipo do website"></img></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a>
					</li>
				</ul>
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
					<li class="nav-item espaco">
						<a class="nav-link"><?php echo "Utilizador: " . $_SESSION['username']; ?></a>
					</li>

					<li class="nav-item">
						<button type="button" class="btn btn-light"><a href="logout.php">Logout</a></button>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<br>