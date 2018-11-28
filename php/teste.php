<?php
session_start();
include('conexao.php');
if (!isset($_SESSION['usuario'])) {
	header('location: login.php');
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Chat-Igarateca</title>
	<link rel="stylesheet" type="text/css" href="../css/css.css">
	<link rel="shortcut icon" type="image/x-png" href="../img/logo2.png">
	<script type="text/javascript" src="../js/teste.js"></script>
	<script type="text/javascript"> $.noConflict();</script>
	<script type="text/javascript" src="../js/menu.js"></script>

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../demo-files/demo.css">
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
					<?php } else {  ?>
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

	<aside class="users_online">
		<ul>
		<?php
			$stmt=$pdo->prepare("SELECT * FROM USUARIOS WHERE USER_ID!=?");
			$stmt->execute([$_SESSION['id']]);
			$resultado=$stmt->fetchAll();
			foreach ($resultado as $value) :
		?>
			<li id="<?=$value['USER_ID'];?>">
				<div class="imgSmall"><img src="../img/avatar1.png"/></div>
				<a href="#" id="<?= $_SESSION['id'].':'.$value['USER_ID'];?>" class="comecar"><?= $value['USER_NOME'];?></a>
				<span id="<?=$value['USER_ID'];?>" class="status off"></span>
			</li>
		<?php endforeach; ?>
	</ul>
	</aside>

	<aside class="chats">

	</aside>
		
	<script type="text/javascript" src="../js/functions.js"></script>	
</body>
</html>
		