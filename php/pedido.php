<?php
session_start();
include('conexao.php');
if(!isset($_SESSION['usuario'])){
	header('location: login.php');
	exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset=UTF-8">
    <title>Cadastro de Livros</title>
    <link rel="stylesheet" href="../css/css.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">
    <link rel="shortcut icon" type="image/x-png" href="../img/logo2.png">
    <link rel="stylesheet" type="text/css" href="../demo-files/demo.css">
	<script type="text/javascript" src="../js/jquery-latest.js"></script>
	<script type="text/javascript" src="../js/menu.js"></script>
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

	<div class="recupera">
		<center>
		<?php if (isset($_SESSION['pedido'])) {?>
			<span style="color: blue;">Pedido realizado com Sucesso!</span>
			
		<?php } elseif(isset($_SESSION['existepedido'])){?>
			<span style="color: red;">Você já realizou uma solicitação! Não será possível realizar outra.</span>
			<?php unset($_SESSION['existepedido']); }?>
		<?php
			if(isset($_GET['i'])){
			$i=$_GET['i'];
			$stmt = $pdo->prepare("SELECT * FROM LIVROS WHERE LIVRO_CODIGO= ? ");
			$stmt ->execute([$i]);
			$resultado = $stmt->fetchAll();	?>
			
			<?php foreach ($resultado as $value) { ?> 
				<h2><?= $value['LIVRO_NOME']; ?> </h2>
				<p>Tipo:</p>
				<input type="text" disabled placeholder="<?= $value['LIVRO_TIPO']; ?>"><br>
				<p>ISBN: </p>
				<input type="text" disabled placeholder="<?= $value['LIVRO_CODIGO']; ?>">
				<p>Prazo para entrega: </p>
				<input type="text" disabled placeholder="<?= $value['LIVRO_PRAZO']; ?> dias"><br><br>
				<a href=confPed.php?i=<?= $value['LIVRO_CODIGO']; ?>>Concluir o pedido</a>
				<?php } }?>
		</center>
	</div>
	
	<div class="copyright">
	<p>©Copyright 2018</p>
	</div>


</body>
</html>