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
    <link rel="stylesheet" type="text/css" href="../demo-files/demo.css">
	<script type="text/javascript" src="../js/jquery-latest.js"></script>
	<script type="text/javascript" src="../js/menu.js"></script>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
	<div class="home">
		<a href="../index.php"><img src="../img/logo3.png" id="logotipo" class="animated bounceInLeft"></a>
			<header>
			<div class="menu_bar">
				<a href="#" class="btn-menu"><span class="icon icon-menu"></span></a>
			</div>
			
			<nav>
				<ul>
					<li><a href="../index.php"><span class="icon icon-home"></span>Início</a></li>
					<li><a href="livros.php"><span class="icon icon-books"></span>Livros</a></li>
					<?php if(isset($_SESSION['usuario'])){
								if ( $_SESSION['usuario']=='Teste' || $_SESSION['usuario']=='igarateca'){ ?>
					<li><a href="cadLivros.php"><span class="icon icon-book"></span>Cadastrar Livros</a></li>
					<li><a href="listped.php"><span class="icon icon-hour-glass"></span>Pedidos</a></li>			
					<?php }  else {  ?>
					<li><a href="list_pedidos.php"><span class="icon icon-hour-glass"></span>Meus pedidos</a></li>
					<?php } }?>
					
					<li><a href="sobre.php"><span class="icon icon-info"></span>Sobre</a></li>
					<?php
					if(isset($_SESSION['usuario'])){ ?>
					<li><a href="conta.php"><span class="icon icon-user-tie"></span><?=$_SESSION['usuario'];?></a></li>
					<li><a href="logout.php"><span class="icon icon-exit"></span>Sair</a></li>
					<?php }else {?>
					<li><a href="registro.php"><span class="icon icon-user-plus"></span>Registrar-se</a></li>
					<li><a href="login.php"><span class="icon icon-user"></span>Login</a></li>
					<?php } ?>
				</ul>
			</nav>
		</header>
	</div>

	<center>
			<form method="GET" action="busca.php" class="form_busca">
				<label>Pesquisar: </label>
				<input class="busca" type="text" name="busca" placeholder=" &#x1F50E; Digite aqui" required="">
				<input class="submit" type="submit" value="Buscar"><br>
			</form>
	<div class="row">
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
				<br><div class="col-md-6"><br>
					
					<p>Nome: <?= $value['LIVRO_NOME'];?></p>
					<p>Tipo: <?=$value['LIVRO_TIPO']; ?></p>
					<p>Autor: <?= $value['LIVRO_AUTOR'];?></p>
					<p>ISBN: <?=$value['LIVRO_CODIGO']; ?></p>
					<p><a href=avaliacao.php?i=<?= $codigo;?> class=" icon icon-star-full">Avaliar</a></p>
					<p><a href=delete.php?i=<?= $codigo;?> class="icon icon-bin">Excluir</a></p>

					<?php 
						$codigo=$value['LIVRO_CODIGO'];
						$id=$value['LIVRO_IMAGEM'];
						$local="../img/livros/";
						$stmt=$pdo->prepare("SELECT * FROM imagem WHERE IMG_ID=?");
						$stmt->execute([$id]); 
						$resultado=$stmt->fetchAll();
						foreach ($resultado as $value) { 
							$imagem=$local.$value['IMG_NOME']?>
						<a href="view.php?i=<?= $codigo; ?>"><img src="<?= $imagem; ?>"></a><br>

					<?php }?>

				</div>
			<?php endforeach ?>
			<?php } else {?>
				<?php   
					$stmt = $pdo->prepare("SELECT * FROM livro LIMIT 8");
					$stmt ->execute();
					$resultado = $stmt->fetchAll();
					
					foreach ($resultado as $value) : $codigo=$value['LIVRO_CODIGO'];?>

					<br><div class="col-md-6"><br>
						<p>Nome: <?= $value['LIVRO_NOME'];?></p>
						<p>Autor: <?= $value['LIVRO_AUTOR'];?></p>
						<p>Tipo: <?=$value['LIVRO_TIPO']; ?></p>
						<p>ISBN: <?=$value['LIVRO_CODIGO']; ?></p>
						<p><a href=pedido.php?i=<?= $codigo; ?> >Solicitar livro</a></p>
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
							<a href="view.php?i=<?= $codigo; ?>"><img src="<?= $imagem; ?>"></a><br>
					</div>
				<?php } endforeach ?>

			<?php } ?>


	</div></center>

	<div class="copyright">
	<p>©Copyright 2018</p>
	</div>


</body>
</html>