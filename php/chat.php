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
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript"> $.noConflict();</script>
</head>
<body>
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
		