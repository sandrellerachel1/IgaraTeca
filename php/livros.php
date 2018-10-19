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

	</div><br>
	<div class="livro"><center>
	<form method="GET" action="busca.php">
		<label style="font-size: 20px;">Pesquisar: </label>
		<input class="busca" type="text" name="busca" placeholder=" Digite aqui">
		<input class="submit" type="submit" value="Buscar"><br>
	</form>
	<?php if (isset($_SESSION['pedido'])) {?>
		<br><span style="color: blue;">Pedido Realizado com sucesso! Apresente o PDF que foi baixado na biblioteca para retirar o livro.</span>
		<?php } unset($_SESSION['pedido']);?>
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
				$stmt = $pdo->prepare("SELECT * FROM livro LIMIT 8");
				$stmt ->execute();
				$resultado = $stmt->fetchAll();
				foreach ($resultado as $value) : ?>
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
	    			<thead>
			        <tr>
				       	<th>Nome do livro</th>
				       	<th>Tipo do livro</th>
				       	

				    </tr>
				    </thead>
					<tbody>
						<?php   
							$stmt = $pdo->prepare("SELECT * FROM livro LIMIT 8");
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
			        </tbody>
			    </table><br>
	</center></div>

	<div class="copyright">
	<p>©Copyright 2018</p>
	</div>

</body>
</html>