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
					echo '<a type="button" class="menu" href="registro.php">Registrar-se</a>', PHP_EOL;
					echo '<a type="button" class="menu" href="login.php">Login</a>';
				}	
				?>			
			</strong>
		</ul></center><br><br><br>

	</div>
	
	<div>
		<center>
			<?php

			$pesquisar=addslashes($_GET['busca']);
			if (isset($_GET['busca']) && empty($_GET['busca'])){
				header('location: livros.php');
				exit();
			}
			else{
				$stmt=$pdo->prepare("SELECT * FROM livro WHERE LIVRO_NOME LIKE '%$pesquisar%'  LIMIT 5");
				$stmt->execute();
				$resultado=$stmt->fetchAll();

				foreach ($resultado as $value) {?>
					<br><div class="grid">
					<p><a href=delete.php?i=<?= $value['LIVRO_CODIGO']?>>Excluir</a></p>
					<p>Autor: Fulano</p>
					<p>Tipo: <?=$value['LIVRO_TIPO']; ?></p>
					<p>ISBN: <?=$value['LIVRO_CODIGO']; ?></p>
					<p><a href=pedido.php?i=<?= $codigo; ?>>Solicitar pedido</a></p>
					<?php 
						$codigo=$value['LIVRO_CODIGO'];
						$id=$value['LIVRO_IMAGEM'];
						$local="../img/livros/";
						$stmt=$pdo->prepare("SELECT * FROM imagem WHERE IMG_ID=?");
						$stmt->execute([$id]); 
						$resultado=$stmt->fetchAll();
						foreach ($resultado as $value) { 
							$imagem=$local.$value['IMG_NOME']?>
						<br><a href="view.php?i=<?= $codigo; ?>"><img src="<?= $imagem; ?>" style="width: 200px; height: 220px;"></a><br>
			<?php
					}//foreach
				} //foreach
			} //else

			?> 
			<br><p><a href="livros.php" class="vol">Voltar</a></strong></p>
		</center>
	</div>


	<div class="copyright">
	<p>©Copyright 2018</p>
	</div>


</body>
</html