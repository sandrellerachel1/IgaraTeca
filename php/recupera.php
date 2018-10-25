<?php
session_start();
include('conexao.php');
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
				<?php if(isset($_SESSION['usuario']) && $_SESSION['usuario']=='Teste' || $_SESSION['usuario']=='igarateca'){
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
			<form method="POST" action="recupera2.php">
				<h1>Alterar senha</h1>
				<?php
					if (isset($_SESSION['altera'])) { ?>
					<span style="color: blue;">Senha alterada com sucesso!</span>
					<?php unset($_SESSION['altera']); ?>
					<?php } elseif (isset($_SESSION['incorreta'])) { ?>
					<span style="color: red;">Senha atual incorreta!</span>
					<?php unset($_SESSION['incorreta']); ?>
					<?php } elseif (isset($_SESSION['diferente'])) { ?>
					<span style="color: red;">Senhas diferentes!</span>
					<?php unset($_SESSION['diferente']); ?>
					<?php } ?>
				<p>Senha atual</p>
				<input type="password" name="senha" placeholder="Sua senha" required=""><br>
				<p>Nova senha</p>
				<input type="password" name="novasenha" placeholder="Nova senha" required=""><br>
				<p>Confirmar senha</p>
				<input type="password" name="novasenha2" placeholder="Confirmar nova senha" required=""><br>
				<input type="submit" value="Redefinir">
			</form>
		</center>
	</div>



	<div class="copyright">
	<p>©Copyright 2018</p>
	</div>


</body>
</html>