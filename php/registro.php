<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Registrar-se</title>
	<link rel="stylesheet" type="text/css" href="../css/css.css">
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
				<?php
				if(isset($_SESSION['usuario'])){
				echo '<a type="button" class="menu" href="logout.php">Sair</a>';
				}
				else{
					echo '<a type="button" class="menu" href="registro.php">Registrar-se</a>', PHP_EOL;
					echo '<a type="button" class="menu" href="login.php">Login</a>';
				}	
				?>
			
			</strong>
		</ul></center><br><br><br>

	</div><br>

	<div class="registro">
		<center>
			<form method="POST" action="registro2.php">
				<img src="../img/avatar1.png" class="avatar">
				<h1>Registro</h1>
				<p>Usuário:</p>
				<input type="text" name="usuario" placeholder=" Usuário" required="">
				<p>Senha:<input type="password" name="senha" placeholder=" Senha" required="">
				<p>Confirmar senha:</p>
				<input type="password" name="senha2" placeholder=" Confirmar senha" required="">
				<p>E-mail:</p>
				<input type="text" name="email" required="" placeholder=" E-mail" required="">
				<input type="submit" value="Enviar">
			</form>
		</center>
	</div>

	<div class="copyright">
	<p>©Copyright 2018</p>
	</div>

</body>
</html>