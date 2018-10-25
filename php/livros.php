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
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
	<a href="../index.php"><img src="../img/logo.png" id="logotipo" class="animated bounceInLeft"></a>
	<div class="home">
		<center><ul>
			<strong>
				<a type="button" class="menu" href="../index.php">Início</a>
				<a type="button" class="menu" href="livros.php">Livros</a>
				<?php if(isset($_SESSION['usuario'])){
							if ( $_SESSION['usuario']=='Teste' || $_SESSION['usuario']=='igarateca'){
								echo '<a type="button" class="menu" href="cadLivros.php">Cadastro de livros</a>';
							}
						} 
				?>
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
		<center>
			<form method="GET" action="busca.php">
				<label style="font-size: 20px;">Pesquisar: </label>
				<input class="busca" type="text" name="busca" placeholder=" Digite aqui" required="">
				<input class="submit" type="submit" value="Buscar"><br>
			</form>
		</center>
		<center>
	<div class="livro">
	<?php if (isset($_SESSION['pedido'])) {?>
		<br><span style="color: blue;">Pedido Realizado com sucesso! Apresente o PDF na biblioteca para retirar o livro.</span>
		<?php } unset($_SESSION['pedido']);?>
	<?php
		if(isset($_SESSION['usuario']) && $_SESSION['usuario']=='Teste'){ ?>

			<?php   
				$stmt = $pdo->prepare("SELECT * FROM livro LIMIT 8");
				$stmt ->execute();
				$resultado = $stmt->fetchAll();
				foreach ($resultado as $value) : $codigo=$value['LIVRO_CODIGO']?>
				<br><div class="grid">
					
					<p>Nome: <?= $value['LIVRO_NOME'];?></p>
					<p>Tipo: <?=$value['LIVRO_TIPO']; ?></p>
					<p>Autor: <?= $value['LIVRO_AUTOR'];?></p>
					<p>ISBN: <?=$value['LIVRO_CODIGO']; ?></p>
					<p><a href=avaliacao.php?i=<?= $codigo;?> >Avaliar</a></p>
					<p><a href=delete.php?i=<?= $codigo;?> >Excluir</a></p>

					<?php 
						$codigo=$value['LIVRO_CODIGO'];
						$id=$value['LIVRO_IMAGEM'];
						$local="../img/livros/";
						$stmt=$pdo->prepare("SELECT * FROM imagem WHERE IMG_ID=?");
						$stmt->execute([$id]); 
						$resultado=$stmt->fetchAll();
						foreach ($resultado as $value) { 
							$imagem=$local.$value['IMG_NOME']?>
						<a href="view.php?i=<?= $codigo; ?>"><img src="<?= $imagem; ?>"></a>

					<?php }?>

				</div>
			<?php endforeach ?>
			<?php } else {?>
				<?php   
					$stmt = $pdo->prepare("SELECT * FROM livro LIMIT 8");
					$stmt ->execute();
					$resultado = $stmt->fetchAll();
					
					foreach ($resultado as $value) : $codigo=$value['LIVRO_CODIGO'];?>

					<br><div class="grid">
						<p>Nome: <?= $value['LIVRO_NOME'];?></p>
						<p>Autor: <?= $value['LIVRO_AUTOR'];?></p>
						<p>Tipo: <?=$value['LIVRO_TIPO']; ?></p>
						<p>ISBN: <?=$value['LIVRO_CODIGO']; ?></p>
						<p><a href=pedido.php?i=<?= $codigo; ?> >Solicitar pedido</a></p>
						<p><a href=avaliacao.php?i=<?= $codigo?>>Avaliar</a></p>
						
						
						<?php 
							$codigo=$value['LIVRO_CODIGO'];
							$id=$value['LIVRO_IMAGEM'];
							$local="../img/livros/";
							$stmt=$pdo->prepare("SELECT * FROM imagem WHERE IMG_ID=?");
							$stmt->execute([$id]); 
							$resultado=$stmt->fetchAll();
							foreach ($resultado as $value) { 
								$imagem=$local.$value['IMG_NOME']?>
							<a href="view.php?i=<?= $codigo; ?>"><img src="<?= $imagem; ?>"></a>
					</div><br>
				<?php } endforeach ?>

			<?php } ?>


	</div></center>

	<div class="copyright">
	<p>©Copyright 2018</p>
	</div>

</body>
</html>