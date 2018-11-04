<?php
session_start();
if(isset($_SESSION['usuario'])){
	header('location: ../index.php');
	exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Registrar-se</title>
	<link rel="stylesheet" type="text/css" href="../css/css.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">
	<link rel="shortcut icon" type="image/x-png" href="../img/logo2.png">
	<link rel="stylesheet" type="text/css" href="../demo-files/demo.css">
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/menu.js"></script>
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

	<div class="registro">
		<center>

			<form method="POST" action="registro2.php">
				<img src="../img/avatar1.png" class="avatar">
				<h1>Registro</h1><br>
				<?php if(isset($_SESSION['user'])){ ?>
					<span style="color: red;">Usuário já existe</span>
					<?php unset($_SESSION['user']); ?>
					<?php } elseif(isset($_SESSION['email'])) {?>
					<span style="color: red;">E-mail já foi utilizado</span>
					<?php unset($_SESSION['email']); ?>
					<?php } elseif(isset($_SESSION['senhas'])) {?>
					<span style="color: red;">Senhas diferentes</span>
					<?php unset($_SESSION['senhas']); ?>
				<?php } elseif(isset($_SESSION['emailinvalido'])) {?>
					<span style="color: red;">E-mail inválido</span>
					<?php unset($_SESSION['emailinvalido']); ?>
				<?php } elseif(isset($_SESSION['matricula'])) {?>
					<span style="color: red">Matrícula já utilizada</span>
					<?php unset($_SESSION['matricula']); ?>
				<?php } ?>
				
				<p>Usuário </p>
				<input class="usuario" type="text" name="usuario" placeholder="Seu nome" required="">
				<p class="matricula" style="">Matrícula
				<br><input type="text" name="matricula" placeholder="Sua matrícula" required=""></p>
				<p>Senha<input type="password" name="senha" placeholder="Insira uma senha" required="">
				<p>Confirmar senha</p>
				<input type="password" name="senha2" placeholder="Confirme a senha" required="">
				<p>E-mail</p>
				<input type="text" name="email" required="" placeholder="Seu e-mail" required="">
				<input type="submit" value="Enviar">
			</form>
		</center>
	</div>

	<div class="copyright">
	<p>©Copyright 2018</p>
	</div>

</body>
</html>