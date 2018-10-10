<?php
session_start();
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Resumo</title>
	<link rel="stylesheet" type="text/css" href="../css/css.css">
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
					echo '<a type="button" class="menu" id="red" href="logout.php">Sair</a>';
				}
				else{
					echo '<a type="button" class="menu" href="registro.php">Registrar-se</a>', PHP_EOL;
					echo '<a type="button" class="menu" href="login.php">Login</a>';
				}	
				?>
			
			</strong>
		</ul></center><br><br><br>


	</div><br>
	<div class="view"><center>
		<?php
			$dado=$_GET['i'];
			$stmt=$pdo->prepare("SELECT * FROM livro WHERE LIVRO_CODIGO='$dado'"); 
			$stmt->execute();
			$resultado = $stmt->fetchAll();	?>
			
			<?php foreach ($resultado as $value) { ?>
			<h1><?= $value['LIVRO_NOME'];?></h1>
			<p><strong>Tipo: <?=$value['LIVRO_TIPO'];?> </strong></p><br>
			<p><strong>Resumo: <?=$value['LIVRO_RESUMO'];?></strong></p>
			<?php } ?>
		<br>
		<p><a href="livros.php" class="vol">Voltar</a></strong></p>
	</center></div>
	<div class="copyright">
	<p>©Copyright 2018</p>
	</div>
	
</body>
</html>