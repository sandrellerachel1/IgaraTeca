<?php
session_start();
include('conexao.php');
if(!isset($_SESSION['usuario'])){
	header('location: ../index.php');
	exit();
}
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
				<a type="button" class="menu" href="livros.php">Livros</a>
				<a type="button" class="menu" href="funcionalidades.php">Funcionalidades</a>
			    <a type="button" class="menu" href="sobre.php">Sobre</a>
				<a type="button" class="menu" href="desenvolvedores.php">Desenvolvedores</a>
				
				<?php
				if(isset($_SESSION['usuario'])){
					echo '<a type="button" class="menu" href="conta.php">Conta</a>', PHP_EOL;
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
			<h1>Conta</h1>
			<?php
				$usuario=$_SESSION['usuario'];
				$stmt=$pdo->prepare("SELECT * FROM Usuario WHERE USER_NOME='$usuario' ");
				$stmt ->execute();
				$resultado=$stmt->fetchAll();

				foreach ($resultado as $value) { ?>
				<p><?= "Login: ".$value['USER_NOME']; ?></p><br>
				<p><?= "E-mail: ".$value['USER_EMAIL']; ?></p><br>
				<p><?= "Senha: "."*****" ?></p><br>
				<a href="#">Alterar senha</a><br>
				
			<?php } ?>

		</center>
	</div>





	<div class="copyright">
	<p>©Copyright 2018</p>
	</div>

</body>
</html>