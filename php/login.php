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
</head>
<body>
	<a href="../index.php"><img src="../img/logo.png" id="logotipo" class="animated bounceInLeft"></a>
	<div class="home">
		<center><ul>
			<strong>
				<a type="button" class="menu" href="../index.php">Início</a>
				<a type="button" class="menu" href="livros.php">Livros</a>
				<a type="button" class="menu" href="funcionalidades.php">Funcionalidades</a>
			    <a type="button" class="menu" href="sobre.php">Sobre</a>
				<a type="button" class="menu" href="registro.php">Registrar-se</a>
				<?php
				if(isset($_SESSION['usuario'])){
					echo '<a type="button" class="menu" href="logout.php">Sair</a>', PHP_EOL;
					echo '<a type="button" class="menu" href="listped.php">Pedidos</a>';
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