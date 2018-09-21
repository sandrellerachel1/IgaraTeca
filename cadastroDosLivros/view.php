<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Resumo</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="weapon">
		<?php
		$dado=$_GET['id'];
		$arquivo= file('livro.csv');
		$linha= explode(";", $arquivo[$dado]);
		echo '<h1>'.$linha[0]." ".'</h1>';
		echo '<p>'."Tipo: ".'<strong>'.$linha[1].'</strong></p><br>';
		echo '<p>'."Resumo: ". $linha[2].'</p>';
		?>
		<p class="back"><a href="cadLivros.php">Voltar</a></p>
	</div>
</body>
</html>