<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset=UTF-8">
    <title>Cadastro de Livros</title>
    <link rel="stylesheet" href="css.css">
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
			</strong>
		</ul>
	</div>
	<div id="livro"><center>
	<table>
	    
	        <tr>
		       	<th>Nome</th>
		       	<th>Tipo do Livro</th>
		    </tr>
			    <?php
			        $filename='livro.csv';
				        $file=file($filename);

					    foreach($file as $key => $value){
					    $linha=explode(";;;", $file[$key]);
				    		echo '<tr>';
					    	echo '<td>'.$linha[0].'</td>';
					    	echo '<td>'.$linha[1].'</td>';
					    	
			        		echo '<td><a href=view.php?id='.$key.'>Resumo</a></td>';
			        		echo '<td><a href=delete.php?id='.$key.'>Remover</a></td>';
				      		echo '</tr>';
					    };
				?>
	        
	    </table><br>
	    <p><a href="cadLivros.php" class="vol">Voltar</a></strong></p>
	</center></div>		
</body>
</html>