<?php
session_start();
include('conexao.php');
if (isset($_SESSION['usuario'])) {
	$_SESSION['user_logado']=1;
	header('location: ../index.php');
	exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Confirmação</title>
	<link rel="stylesheet" type="text/css" href="../css/css.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">
	<link rel="stylesheet" type="text/css" href="../demo-files/demo.css">
	<link rel="shortcut icon" type="image/x-png" href="../img/logo.png">
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
					<li><a href="livros.php"><span class="icon icon-book"></span>Livros</a></li>
					<li><a href="sobre.php"><span class="icon icon-eye"></span>Sobre</a></li>
					<li><a href="registro.php"><span class="icon icon-user-plus"></span>Registrar-se</a></li>
					<li><a href="login.php"><span class="icon icon-user"></span>Login</a></li>
				</ul>
			</nav>
		</header>
	</div>

		<div class="sobre">
		<center>
			<p><?php 
				$i=$_GET['i'];
				$stmt = $pdo->prepare("SELECT * FROM USUARIOS");
				$stmt ->execute();
				$resultado = $stmt->fetchAll();	
				
				foreach ($resultado as $value) {
					if(md5($value['USER_ID'])==$i && $value['USER_STATUS']=='1'){
						echo "Erro! Usuário já foi validado.";
						exit();
					}
				}
				if(!empty($i) && md5($value['USER_ID'])==$i){
					$stmt=$pdo->prepare("UPDATE USUARIOS SET USER_STATUS=? WHERE MD5(USER_ID) = ?");
					$stmt->execute([1, $i]);
					echo "Cadastro confirmado com sucesso!";
				}
				?> 
			</p>
		</center></div>

	<div class="copyright">
	<p>©Copyright 2018</p>
	</div>

</body>
</html>