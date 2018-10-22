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
    <link rel="shortcut icon" type="image/x-png" href="../img/logo2.png">
</head>
<body>
	<a href="../index.php"><img src="../img/logo.png" id="logotipo" class="animated bounceInLeft"></a>
	<div class="home">
		<center><ul>
			<strong>
				<a type="button" class="menu" href="../index.php">Início</a>
				<a type="button" class="menu" href="livros.php">Livros</a>
				<?php if(isset($_SESSION['usuario']) && $_SESSION['usuario']=='Teste'){
					echo '<a type="button" class="menu" href="cadLivros.php">Cadastro de livros</a>';
				} ?>
				<a type="button" class="menu" href="funcionalidades.php">Funcionalidades</a>
			    <a type="button" class="menu" href="sobre.php">Sobre</a>
				
				<?php
				if(isset($_SESSION['usuario'])){
					echo '<a type="button" class="menu" id="usu" href="conta.php">'.$_SESSION['usuario'].'</a>', PHP_EOL;
					echo '<a type="button" class="menu" href="logout.php">Sair</a>';
				}
				else{
					echo '<a type="button" class="menu" href="login.php">Login</a>';
				}
				?>
			
			</strong>
		</ul></center><br><br><br>

	</div><br>

	<div class="recupera">
		<center>
			<h1>Conta</h1>
			<?php
				$usuario=$_SESSION['usuario'];
				$stmt=$pdo->prepare("SELECT * FROM Usuario WHERE USER_NOME=? ");
				$stmt ->execute([$usuario]);
				$resultado=$stmt->fetchAll();

				foreach ($resultado as $value) { ?>
				<p><?= "Login: ".$value['USER_NOME']; ?></p><br>
				<p><?= "Matrícula: ".$value['USER_MATRICULA']; ?></p><br>
				<p><?= "E-mail: ".$value['USER_EMAIL']; ?></p><br>
				<p><?= "Senha: "."*****" ?></p><br>
				<a href="recupera.php">Alterar senha</a><br>
				
			<?php } ?>

		</center>
	</div>





	<div class="copyright">
	<p>©Copyright 2018</p>
	</div>

</body>
</html>