<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset=UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../css/css.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">
</head>
<body>
	<a href="../index.php"><img src="../img/logo.png" id="logotipo" class="animated bounceInLeft"></a>
	<div class="home">
		<center><ul>
			<strong>
				<a type="button" class="menu" href="../index.php">Início</a>
				<a type="button" class="menu" href="cadLivros.php">Livros</a>
				<a type="button" class="menu" href="funcionalidades.php">Funcionalidades</a>
			    <a type="button" class="menu" href="sobre.php">Sobre</a>
				<a type="button" class="menu" href="desenvolvedores.php">Desenvolvedores</a>
				<a type="button" class="menu" href="registro.php">Registrar-se</a>
				<?php
				if(isset($_SESSION['usuario'])){
				echo '<a type="button" class="menu" href="logout.php">Sair</a>';
				}
				else{
					echo '<a type="button" class="menu" href="login.php">Login</a>';
				}
				?>
			
			</strong>
		</ul></center><br><br><br>

	</div><br>
	
	<div class="login">
		<center>
			<form method="POST" action="login2.php">
				<img src="../img/avatar1.png" class="avatar">
	        	<h1>Login</h1>
	            <p>Usuário:</p>
	            <input type="text" name="usuario" placeholder="Usuário" required="">
	            <p>Senha:</p>
	            <input type="password" name="senha" placeholder="Senha" required="">
	            <input type="submit" value="Login">
			</form>
		</center>
	</div>

	<div class="copyright">
	<p>©Copyright 2018</p>
	</div>