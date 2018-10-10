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
		if(isset($_SESSION['usuario']) && $_SESSION['usuario']=='Teste'){ ?>		   
	<table>
	    
	        <tr>
		       	<th>ISBN</th>
		       	<th>Nome do livro</th>
		       	<th>Tipo do livro</th>
		       	<th></th>

		    </tr>
				<?php   
					$stmt = $pdo->prepare("SELECT * FROM livro");
					$stmt ->execute();
					$resultado = $stmt->fetchAll();	?>
					<?php foreach ($resultado as $value) : ?>
			<tr>
				<td><?= $value['LIVRO_CODIGO']; ?></td>
				<td><?= $value['LIVRO_NOME']; ?></td>
				<td><?= $value['LIVRO_TIPO']; ?></td>
				<td><a href=view.php?i=<?= $value['LIVRO_CODIGO']?>>Resumo</td>
				<td><a href=delete.php?i=<?= $value['LIVRO_CODIGO']?>>Excluir</td>
			</tr>
			<?php endforeach ?>
			<?php } else {?>
				<table>
	    
			        <tr>
				       	<th>Nome do livro</th>
				       	<th>Tipo do livro</th>
				       	

				    </tr>
						<?php   
							$stmt = $pdo->prepare("SELECT * FROM livro");
							$stmt ->execute();
							$resultado = $stmt->fetchAll();	?>
							<?php foreach ($resultado as $value) : ?>
					<tr>
						<td><?= $value['LIVRO_NOME']; ?></td>
						<td><?= $value['LIVRO_TIPO']; ?></td>
						<td><a href=view.php?i=<?= $value['LIVRO_CODIGO']?> >Resumo</td>
						<td><a href=pedido.php?i=<?= $value['LIVRO_CODIGO']?> >Soliticar livro</a></td>
					</tr>
						<?php endforeach ?>
			<?php } ?>
			        
			    </table><br>
	</center></div>

	<div class="copyright">
	<p>©Copyright 2018</p>
	</div>

</body>
</html>