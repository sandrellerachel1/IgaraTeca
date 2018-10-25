<?php
session_start();
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Resumo</title>
	<link rel="stylesheet" type="text/css" href="../css/css.css">
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
	<div class="view"><center>
		<?php
			$dado=$_GET['i'];
			$stmt=$pdo->prepare("SELECT * FROM livro WHERE LIVRO_CODIGO=?"); 
			$stmt->execute([$dado]);
			$resultado = $stmt->fetchAll();	?>
			
			<?php foreach ($resultado as $value) { ?>
			<h1><?= $value['LIVRO_NOME'];?></h1>
			<p>Tipo: <?=$value['LIVRO_TIPO'];?> </p>
			<p>Resumo: <?=$value['LIVRO_RESUMO'];?> </p>
			<?php 
			$pega=$value['LIVRO_NOME'];
			$stmt=$pdo->prepare("SELECT * FROM imagem WHERE IMG_ID=? ");
			$stmt->execute([$value['LIVRO_IMAGEM']]);
			$resultado=$stmt->fetchAll();
			foreach ($resultado as $value) {
				$local="../img/livros/";
				$imagem=$local.$value['IMG_NOME'];
			?>
			<img src="<?= $imagem; ?>">
		
			<?php } }?>
		<br>
		<p style=" margin-bottom: 40px;"><a href="livros.php" class="vol">Voltar</a></strong></p>
	</center></div>
	<div class="copyright">
	<p>©Copyright 2018</p>
	</div>
	
</body>
</html>