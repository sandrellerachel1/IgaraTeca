<?php
session_start();
if(isset($_SESSION['usuario'])){
	header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset=UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../css/css.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">
    <link rel="shortcut icon" type="image/x-png" href="../img/logo2.png">
    <link rel="stylesheet" type="text/css" href="../demo-files/demo.css">
	<script type="text/javascript" src="../js/jquery-latest.js"></script>
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
	
	<div class="login">
		<center>
			<form method="POST" action="login2.php">
				<img src="../img/avatar1.png" class="avatar">
	        	<h1>Login</h1>
	        	<?php if (isset($_SESSION['sucesso'])) {?>
	        		<span style="color: blue; font-size: 15px;">Usuário cadastrado com sucesso! Vá até seu e-mail para validar seu usuário.</span>
					<?php unset($_SESSION['sucesso']); ?>
				<?php } elseif (isset($_SESSION['naoexiste'])) { ?>
					<span style="color: red;">Usuário não existe!</span>
					<?php unset($_SESSION['naoexiste']);?>
				<?php } elseif (isset($_SESSION['incorreta'])) { ?>
					<span style="color: red;">Senha incorreta!</span>
					<?php unset($_SESSION['incorreta']); ?>
				<?php } ?>
	            <p>Usuário</p>
	            <input type="text" name="usuario" placeholder="Usuário" required="">
	            <p>Senha</p>
	            <input type="password" name="senha" placeholder="Senha" required="">
	            <input type="submit" value="Login">
			</form>
		</center>
	</div>

	<div class="copyright">
	<p>©Copyright 2018</p>
	</div>