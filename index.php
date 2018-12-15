<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>IgaraTeca</title>
	
	<link rel="stylesheet" type="text/css" href="css/css.css">
	<link rel="shortcut icon" type="image/x-png" href="img/logo2.png">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">
	<link rel="stylesheet" type="text/css" href="demo-files/demo.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery.cycle.all.js"></script>
	<script type="text/javascript" src="js/menu.js"></script>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<script type="text/javascript">
		$(function(){
			$('.slide ul').cycle({
				fx: 'fade',
				speed: 3000,
				timeout: 2500,
				prev:'.anterior',
				next:'.proxima',
			});
			$('div.slide').hover(function(){
				$('section.botao').fadeIn();},
				function(){
					$('section.botao').fadeOut();
			});
		});
	</script>
</head>
<body>

	<div class="home">
		<a href="index.php"><img src="img/logo3.png" id="logotipo" class="animated bounceInLeft"></a>
		<header>
		<div class="menu_bar">
			<a href="#" class="btn-menu"><span class="icon icon-menu"></span></a>
		</div>

		<nav>
			<ul>
				<li><a href="index.php"><span class="icon icon-home"></span>Início</a></li>
				<li><a href="php/livros.php"><span class="icon icon-books"></span>Livros</a></li>
				<?php if(isset($_SESSION['usuario'])){
							if ( $_SESSION['usuario']=='Teste' || $_SESSION['usuario']=='igarateca'){ ?>
				<li><a href="php/cadLivros.php"><span class="icon icon-book"></span>Cadastrar Livros</a></li>
				<li><a href="php/listped.php"><span class="icon icon-hour-glass"></span>Pedidos</a></li>			
				<?php }  else {  ?>
					<li><a href="php/list_pedidos.php"><span class="icon icon-hour-glass"></span>Meus pedidos</a></li>
					<?php } } ?>
				<li><a href="php/sobre.php"><span class="icon icon-info"></span>Sobre</a></li>
				<?php
				if(isset($_SESSION['usuario'])){ ?>
				<li><a href="php/conta.php"><span class="icon icon-user-tie"></span><?=$_SESSION['usuario'];?></a></li>
				<li><a href="php/logout.php"><span class="icon icon-exit"></span>Sair</a></li>
				<?php }else {?>
				<li><a href="php/registro.php"><span class="icon icon-user-plus"></span>Registrar-se</a></li>
				<li><a href="php/login.php"><span class="icon icon-user"></span>Login</a></li>
				<?php } ?>
			</ul>
		</nav>
	</header>

</div>

	<center>
		<p class="destaque">Livros em destaque</p>
		<div class="slide">
			<section class="botao">
				<a href="#" class="anterior">&laquo;</a>
				<a herf="#" class="proxima">&raquo;</a>
			</section>
			<ul>
				<a href="php/view.php?i=3653453"><li><img src="img/hitman.jpg"></li></a>
				<a href="php/view.php?i=4334553"><li><img src="img/gramatica.jpg"></li></a>
				<a href="php/view.php?i=3546346"><li><img src="img/ocortico.jpg"></li></a>
			</ul>
		</div>

	</center>
	<?php if (isset($_SESSION['user_logado'])) {
		echo "<script> alert('Erro! Você está logado com outro usuário. Faça o logout e tente novamente.');</script>";
		unset($_SESSION['user_logado']);
	}?>
	
	<center>
		<div class="teste">

			<div class="acervo">
				<span class="icon icon-tablet"></span><br>
				<label>Acervo</label>
				<p>Pode ser acessada por computadores, tablets e smartphones</p>
			</div>

			<div class="acesso">
				<span class="icon icon-clock"></span><br>
				<label>Acessibilidade</label>
				<p>Pode ser acessada a qualquer hora do dia</p>
			</div>
		</div>
	</center>
	
	<div class="copyright">
	<p>©Copyright 2018</p>
	</div>


</body>
</html>
