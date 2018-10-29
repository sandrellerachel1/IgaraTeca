<?php
session_start();
include('conexao.php');
if(!isset($_SESSION['usuario'])){
	header('location: login.php');
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
					<li><a href="livros.php"><span class="icon icon-book"></span>Livros</a></li>
					<?php if(isset($_SESSION['usuario'])){
								if ( $_SESSION['usuario']=='Teste' || $_SESSION['usuario']=='igarateca'){ ?>
					<li><a href="cadLivros.php"><span class="icon icon-book"></span>Cadastrar Livros</a></li>
					<li><a href="listped.php"><span class="icon icon-hour-glass"></span>Pedidos</a></li>			
					<?php } }  ?>
					
					<li><a href="sobre.php"><span class="icon icon-eye"></span>Sobre</a></li>
					<?php
					if(isset($_SESSION['usuario'])){ ?>
					<li><a href="conta.php"><span class="icon icon-user-tie"></span><?=$_SESSION['usuario'];?></a></li>
					<li><a href="logout.php"><span class="icon icon-exit"></span>Sair</a></li>
					<?php }else {?>
					<li><a href="registro.php"><span class="icon icon-user-plus"></span>Registrar-se</a></li>
					<li><a href="login.php"><span class="icon icon-user"></span>Login</a></li>
					<?php } ?>
				</ul>
			</nav>
		</header>
	</div>

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