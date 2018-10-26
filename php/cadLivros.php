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
</head>
<body>
	<a href="../index.php"><img src="../img/logo.png" id="logotipo" class="animated bounceInLeft"></a>
	<div class="home">
		<center><ul>
			<strong>
				<a type="button" class="menu" href="../index.php">Início</a>
				<a type="button" class="menu" href="livros.php">Livros</a>
				<?php if(isset($_SESSION['usuario'])){
						if ( $_SESSION['usuario']=='Teste' || $_SESSION['usuario']=='igarateca'){
							echo '<a type="button" class="menu" href="cadLivros.php">Cadastro de livros</a>', PHP_EOL;
							echo '<a type="button" class="menu" href="listped.php">Pedidos</a>';
						}
					} 
				?>
				<a type="button" class="menu" href="funcionalidades.php">Funcionalidades</a>
			    <a type="button" class="menu" href="sobre.php">Sobre</a>
				<?php
				if(isset($_SESSION['usuario'])){
					echo '<a type="button" class="menu" id="usu" href="conta.php">'.$_SESSION['usuario'].'</a>', PHP_EOL;
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
	<center>
	<div class="cadlivro">
		<?php if (isset($_SESSION['livro_existe'])){?>
			<script> alert('ISBN já cadastrado');</script>
		<?php } unset($_SESSION['livro_existe']) ;?>
		<?php
		//Verifica se o usuário pode ter acesso ao cadastro de livros
		if(isset($_SESSION['usuario']) && $_SESSION['usuario']=='Teste' || $_SESSION['usuario']=='igarateca'){ ?>
	    
		<form method="POST" action="addlivro.php" enctype="multipart/form-data">
			<h1>Cadastro de livros</h1>
			<p>Nome do livro:</p>
			<input style="width: 50%; margin-left: -227px;" type="text" name="livro" placeholder="Nome do livro" required="">
			<p style="margin-top: -81px; margin-left: 275px;">Autor:
			<br><input style="width: 100%;" type="text" name="autor" placeholder="Nome do autor" required=""></p>
			<p>Tipo do livro:</p><br>
			<select name="tipo" required="" >
				<option value="" disabled="">Tipo do Livro</option>
				<option value="acao">Ação</option>
				<option value="romance">Romance</option>
				<option value="didatico">Didático</option>
			</select>
			<p class="file">Selecionar imagem: <input type="file" name="arquivo" required=""></p>
			<p>ISBN do livro:</p>
			<input type="text" name="codigo" placeholder="ISBN do livro" required=""><br>
			<p>Resumo do livro:</p><br>
			<textarea name="resumo" cols="39" rows="10" placeholder=" Resumo"></textarea><br><br>
			<input type="submit" value="Cadastrar">
		</form>
		<?php } ?>
	</div><br>
	</center>

	<div class="copyright">
	<p>©Copyright 2018</p>
	</div>
			
</body>
</html>