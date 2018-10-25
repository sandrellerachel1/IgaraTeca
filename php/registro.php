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
			<script type="text/javascript">
				alert("Atenção! Ao cadastrar-se verifique se seu e-mail está correto, pois só será possível fazer login com seu usuário depois que o cadastro for confirmado no e-mail.");
			</script>
			
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
				<input style="width: 45%; margin-left: -188px;" type="text" name="usuario" placeholder="Usuário" required="">
				<p style="margin-top: -81px; margin-left: 185px;">Matrícula
				<br><input style="width: 100%;" type="text" name="matricula" placeholder="Matrícula" required=""></p>
				<p>Senha<input type="password" name="senha" placeholder="Senha" required="">
				<p>Confirmar senha</p>
				<input type="password" name="senha2" placeholder="Confirmar senha" required="">
				<p>E-mail</p>
				<input type="text" name="email" required="" placeholder="E-mail" required="">
				<input type="submit" value="Enviar">
			</form>
		</center>
	</div>

	<div class="copyright">
	<p>©Copyright 2018</p>
	</div>

</body>
</html>