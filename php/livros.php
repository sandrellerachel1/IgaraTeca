<?php
session_start();
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
				<a type="button" class="menu" href="cadLivros.php">Livros</a>
				<a type="button" class="menu" href="funcionalidades.php">Funcionalidades</a>
			    <a type="button" class="menu" href="sobre.php">Sobre</a>
				<a type="button" class="menu" href="desenvolvedores.php">Desenvolvedores</a>
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
	<div class="livro"><center>
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

	<div class="copyright">
	<p>©Copyright 2018</p>
	</div>

</body>
</html>