<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>GAD-Biblio 1.0</title>
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
				<li><a href="login.php">Login</a></li>
			</strong>
		</ul>
		<h1>GAD-Biblio 1.0</h1>
	</div>
		<strong><p id=dest>Livros em destaque</p></strong>
	<div id="destaque">
		<table>
			    <?php
			        $filename='livro.csv';
				    $file=file($filename);

					foreach($file as $key => $value){
					$linha=explode(";;;", $file[$key]);
					    echo '<tr><td><a href=view.php?id='.$key.'><strong>'.$linha[0].'</strong></a></td></tr>';
					    
					};
				?>
	        
	    </table>
</body>
</html>
