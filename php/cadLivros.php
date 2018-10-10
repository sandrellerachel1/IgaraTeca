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
				<a type="button" class="menu" href="desenvolvedores.php">Desenvolvedores</a>
				<?php
				if(isset($_SESSION['usuario'])){
					echo '<a type="button" class="menu" href="conta.php">Conta</a>', PHP_EOL;
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
	
	<div class="livro"><center>
		<?php
		//Verifica se o usuário pode ter acesso ao cadastro de livros
		if(isset($_SESSION['usuario']) && $_SESSION['usuario']=='Teste'){ ?>
	    <div class="cadlivro">
		<form method="POST" action="addlivro.php">
			<h1>Cadastro de livros</h1>
			<p>Nome do livro:</p>
			<input type="text" name="livro" placeholder="Nome do livro" required=""><br>
			<p>Tipo do livro:</p><br>
			<select name="tipo" required="">
				<option value="" disabled="">Tipo do Livro</option>
				<option value="acao">Ação</option>
				<option value="romance">Romance</option>
				<option value="infantil">Infantil</option>
				<option value="didatico">Didático</option>
			</select><br><br>
			<p>Identificação do livro:</p>
			<input type="text" name="codigo" placeholder="Identificação do livro" required=""><br>
			<p>Resumo do livro:</p><br>
			<textarea name="resumo" cols="39" rows="10" placeholder="Resumo"></textarea><br><br>
			<input type="submit" value="Cadastrar">
		</form>
		<?php } ?>
			
			        
			    </table><br>

	</div>;

	<div class="copyright">
	<p>©Copyright 2018</p>
	</div>
			
</body>
</html>