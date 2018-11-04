<?php
session_start();
include('conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset=UTF-8">
    <title>Cadastro de Livros</title>
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
					<?php if(isset($_SESSION['usuario'])){
								if ( $_SESSION['usuario']=='Teste' || $_SESSION['usuario']=='igarateca'){ ?>
					<li><a href="cadLivros.php"><span class="icon icon-book"></span>Cadastrar Livros</a></li>
					<li><a href="listped.php"><span class="icon icon-hour-glass"></span>Pedidos</a></li>			
					<?php } }  ?>
					
					<li><a href="sobre.php"><span class="icon icon-info"></span>Sobre</a></li>
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

	<center>
	<div class="cadlivro">
		<?php if (isset($_SESSION['livro_existe'])){?>
			<script> alert('ISBN já cadastrado');</script>
		<?php } unset($_SESSION['livro_existe']) ;?>
		<?php
		//Verifica se o usuário pode ter acesso ao cadastro de livros
		if(isset($_SESSION['usuario'])){
			if($_SESSION['usuario']=='Teste' || $_SESSION['usuario']=='igarateca'){ ?>
	    
		<form method="POST" action="addlivro.php" enctype="multipart/form-data">
			<h1>Cadastro de livros</h1>
			<p>Nome do livro:</p>
			<input class="name_book" type="text" name="livro" placeholder="Nome do livro" required="">
			<p class="name_autor">Autor:
			<br><input style="width: 100%;" type="text" name="autor" placeholder="Nome do autor" required=""></p>
			<p>Tipo do livro:</p><br>
			<select name="tipo" required="" >
				<option value="" disabled="">Tipo do Livro</option>
				<option value="acao">Ação</option>
				<option value="romance">Romance</option>
				<option value="didatico">Didático</option>
			</select>
			<p class="file">Selecionar imagem: <input type="file" name="arquivo" required=""></p><br>
			<p>ISBN do livro:</p>
			<input type="text" name="codigo" placeholder="ISBN do livro" required=""><br>
			<p>Resumo do livro:</p><br>
			<textarea name="resumo" cols="39" rows="10" placeholder=" Resumo (Máximo 255 caracteres)"></textarea><br><br>
			<input type="submit" value="Cadastrar">
		</form>
		<?php } }?>
	</div><br>
	</center>

	<div class="copyright">
	<p>©Copyright 2018</p>
	</div>
			
</body>
</html>