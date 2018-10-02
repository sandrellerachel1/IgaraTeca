<?php
session_start();
include('conexao.php');
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
		<div class="sobre">
		<center>
			<p><?php 
				$i=$_GET['i'];
				if(!empty($i)){
					$pdo->query("UPDATE Usuario SET USER_STATUS='1' WHERE MD5(USER_ID) = '$i'");
					echo "Cadastro confirmado com sucesso!";
				}

			?> </p>
		</center></div>

	<div class="copyright">
	<p>©Copyright 2018</p>
	</div>

</body>
</html>