<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Resumo</title>
	<link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>
	<div id="menu">

		<ul>
			<strong>
				<li><a href="index.php">Início</a></li>
				<li><a href="cadLivros.php">Livros</a></li>
				<li><a href="motivo.php">Motivos</a></li>
				<li><a href="sobre.php">Sobre</a></li>
				<li><a href="desenvolvedores.php">Desenvolvedores</a></li>
				<li><a href="#">Login</a></li>
			</strong>
		</ul>
	</div>
	<div id="view"><center>
		<?php
			$dado=$_GET['id'];
			$arquivo= file('livro.csv');
			$linha= explode(";;;", $arquivo[$dado]);
			echo '<h1>'.$linha[0]." ".'</h1>';
			echo '<p>'."Tipo: ".'<strong>'.$linha[1].'</strong></p><br>';
			echo '<p>'.'<strong>'."Resumo: ".'</strong>'. $linha[2].'</p>';
		?><br>
		<p><a href="livros.php" class="vol">Voltar</a></strong></p>
	</center></div>
</body>
</html>