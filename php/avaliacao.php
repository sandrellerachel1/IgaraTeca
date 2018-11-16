<?php
session_start();
include('conexao.php');
if (!isset($_SESSION['usuario'])) {
	header('location: login.php');
	exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset=UTF-8">
    <title>Avaliação</title>
    <link rel="stylesheet" href="../css/css.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">
    <link rel="shortcut icon" type="image/x-png" href="../img/logo2.png">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../demo-files/demo.css">
	<script type="text/javascript" src="../js/jquery-latest.js"></script>
	<script type="text/javascript" src="../js/menu.js"></script>
	<script type="text/javascript" src="../js/avaliations.js"></script>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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

	<?php
		if(isset($_SESSION['usuario'])){
			if($_SESSION['usuario']=='Teste'){ 
			header("location: ../index.php"); 
			exit();
		}
	}
	?>
	<center>
	<div class="livro" style="margin-top: 60px;">

			
			<?php
				$get=$_GET['i'];
				$stmt = $pdo->prepare("SELECT * FROM LIVROS WHERE LIVRO_CODIGO=?");
				$stmt ->execute([$get]);
				$resultado = $stmt->fetchAll();
				foreach ($resultado as $value) : 
					$codigo=$value['LIVRO_CODIGO'];
						$id=$value['LIVRO_IMAGEM'];?>
				<br><div class="grid" "><center>
					
					<p>Nome: <?= $value['LIVRO_NOME'];?></p>
					<p>Autor: <?= $value['LIVRO_AUTOR'];?></p>
					<p>Tipo: <?=$value['LIVRO_TIPO']; ?></p>
					<p>ISBN: <?=$value['LIVRO_CODIGO']; ?></p>
					<?php 
					$stmt=$pdo->prepare("SELECT * FROM AVALIACOES WHERE AVL_COD_LIVRO=?");
					$stmt->execute([$get]);
					$resultado=$stmt->fetchAll();
					foreach($resultado as $value):?>
					<span class="ratingAverage" data-average="<?= $value['AVL_MEDIA_VOTOS'];?>"></span>
					<span class="article" data-id="<?= $get;?>"></span>

					<br><div class="barra">
						<span class="bg"></span>
						<span class="stars">
							<?php for($i=1; $i<=5; $i++):?>

							<span class="star" data-vote="<?= $i;?>">
								<span class="starAbsolute"></span>
							</span>
							<?php 
								endfor;?>
						</span>
					</div>
					<br><p class="votos"><span><?= $value['AVL_QTD_PESSOAS'];?></span> votos</p>
					<?php
						endforeach;
					?>
					</div>

					<?php 
						
						$local="../img/livros/";
						$stmt=$pdo->prepare("SELECT * FROM IMAGENS WHERE IMG_ID=?");
						$stmt->execute([$id]); 
						$resultado=$stmt->fetchAll();
						foreach ($resultado as $value) { 
							$imagem=$local.$value['IMG_NOME']?>
						<a href="view.php?i=<?= $codigo; ?>"><img src="<?= $imagem; ?>" style="margin-top: -350px; " ></a>
						
					<?php }?>

				</div>
			<?php endforeach ?>
	</div>
	</center>

	<div class="copyright">
	<p>©Copyright 2018</p>
	</div>

</body>
</html>