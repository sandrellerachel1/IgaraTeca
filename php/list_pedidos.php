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
    <title>Meus pedidos</title>
    <link rel="stylesheet" href="../css/css.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">
    <link rel="shortcut icon" type="image/x-png" href="../img/logo2.png">
	<script src="../js/jquery.js"></script>
	
	<link rel="stylesheet" type="text/css" href="../demo-files/demo.css">
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

		<center>
			<h2 class="h2">Meus pedidos</h2>

			<form id="pesquisa" action="" method="POST" enctype="multipart/form-data">
			<input type="text"  name="busca" id="input" autocomplete="off">
			<input type="submit">
			</form>

			<div>
				<table id="pedidos">
					<thead>
						<tr>
							<td>ISBN</td>
							<td>Data</td>
							<td>Cod. Pedido</td>
							<td>Nome</td>
							<td>Matrícula</td>
							<td>E-mail</td>
							<td>PDF</td>
						</tr>
					</thead>

					<tbody id=tbody>
						<?php 
						$stmt=$pdo->prepare("SELECT * FROM PEDIDOS");
						$stmt->execute();
						$resultado=$stmt->fetchAll();
						$livro='';
						foreach ($resultado as $value) { $livro=$value['PED_COD_LIVRO'];?>
							
							<tr>
								<td><?= $value['PED_COD_LIVRO']; ?></td>
								<td><?= $value['PED_DATA']; ?></td>
								<td><?= $value['PED_CODIGO']; ?></td>
						
							<?php 
							$stmt=$pdo->prepare("SELECT * FROM USUARIOS WHERE USER_ID=?");
							$stmt->execute([$_SESSION['id']]);
							$resultado=$stmt->fetchAll();
							foreach ($resultado as $value) {  ?>

								<td><?= $value['USER_NOME'];?> </td>
								<td><?= $value['USER_MATRICULA'];?> </td>
								<td><?= $value['USER_EMAIL']; ?></td>
								<td><a href=comprovante.php?i=<?=$livro;?> > Baixar PDF</a></td>
								
							</tr>
						
					<?php  } } ?>
					</tbody>
			
				</table>
			</div>
		</center>

		<script type="text/javascript">
			$(document).ready(function(){
				document.getElementById("pesquisa").addEventListener("keyup", function(){
					var busca=document.getElementById("input").value.toLowerCase();
					var pedido=document.getElementById("tbody").innerHTML;
					if(busca>=1){
						
						$.post('pesquisa.php', { pedido:busca }, function(retorna){
							$("#tbody").html(retorna);
						});
					}
					else{
						$("#tbody").html(pedido);
					console.log(pedido);
					}
					
				});
			});
		</script>
	
	<div class="copyright">
	<p>©Copyright 2018</p>
	</div>

</body>
</html>