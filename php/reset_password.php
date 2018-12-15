<?php
session_start();
include('conexao.php');
if (!isset($_GET['i']) || isset($_SESSION['usuario'])) {
	header('location: ../index.php');
	exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset=UTF-8">
    <title>Redefinir senha</title>
    <link rel="stylesheet" href="../css/css.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">
    <link rel="shortcut icon" type="image/x-png" href="../img/logo2.png">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../demo-files/demo.css">
	<script type="text/javascript" src="../js/jquery-latest.js"></script>
	<script type="text/javascript" src="../js/menu.js"></script>
	<script type="text/javascript" src="../js/avaliations.js"></script>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>

	<div class="home">
		<a href="../index.php"><img src="../img/logo3.png" id="logotipo" class="animated bounceInLeft"></a>
		<header>
		<div class="menu_bar">
			<a href="#" class="btn-menu"><span class="icon icon-menu"></span></a>
		</div>

			<nav>
				<ul>
					<li><a href="../index.php"><span class="icon icon-home"></span>Início</a></li>
					<li><a href="livros.php"><span class="icon icon-books"></span>Livros</a></li>
					<li><a href="sobre.php"><span class="icon icon-info"></span>Sobre</a></li>
					<li><a href="registro.php"><span class="icon icon-user-plus"></span>Registrar-se</a></li>
					<li><a href="login.php"><span class="icon icon-user"></span>Login</a></li>
				</ul>
			</nav>
		</header>
	</div>
	<center>
	
	<?php
		$email=$_GET['i'];
		if(isset($_SESSION['link_expirou'])){
			echo '<script>alert("O link já foi utilizado! Reenvie o e-mail para redefinir sua senha.")</script>';
			unset($_SESSION['link_expirou']);
		}
	?>
	<div class="recupera">
		<form method="POST" action="reset_password2.php">
			<h1>Recuperar senha</h1><br>
			<label style="float: left;">Nova senha</label>
			<p><input type="password" name="senha1" placeholder="Digite aqui" required></p><br>
			<label style="float: left;">Confirmar nova senha</label>
			<p><input type="password" name="senha2" placeholder="Digite aqui" required></p><br>
			<input type="hidden" name="email" value="<?=$email;?>">
			<input type="submit" value="Enviar">
		</form>
	</div>
	</center>




	<div class="copyright">
		<p>©Copyright 2018</p>
	</div>

</body>
</html>