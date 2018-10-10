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
</head>
<body>
	<a href="../index.php"><img src="../img/logo.png" id="logotipo" class="animated bounceInLeft"></a>
	<div class="home">
		<center><ul>
			<strong>
				<a type="button" class="menu" href="../index.php">Início</a>
				<a type="button" class="menu" href="livros.php">Livros</a>
				<?php if(isset($_SESSION['usuario']) && $_SESSION['usuario']=='Teste'){
					echo '<a type="button" class="menu" href="cadLivros.php">Cadastro de livros</a>';
				} ?>
				<a type="button" class="menu" href="funcionalidades.php">Funcionalidades</a>
			    <a type="button" class="menu" href="sobre.php">Sobre</a>
				<a type="button" class="menu" href="desenvolvedores.php">Desenvolvedores</a>
				<?php
				if(isset($_SESSION['usuario'])){
					echo '<a type="button" class="menu" href="conta.php">Conta</a>', PHP_EOL;
					echo '<a type="button" class="menu" href="logout.php">Sair</a>';
				}
				else{
					echo '<a type="button" class="menu" href="registro.php">Registrar-se</a>', PHP_EOL;
					echo '<a type="button" class="menu" href="login.php">Login</a>';
				}	
				?>			
			</strong>
		</ul></center><br><br><br>

	</div>

	<div class="login">
		<center>
		<?php if (isset($_SESSION['pedido'])) {?>
			<span style="color: blue;">Pedido realizado com Sucesso!</span>
			<?php unset($_SESSION['pedido']); ?>
		<?php } ?>
		<?php
			if(isset($_GET['i'])){
			$i=$_GET['i'];
			$stmt = $pdo->prepare("SELECT * FROM livro WHERE LIVRO_CODIGO='$i' ");
			$stmt ->execute();
			$resultado = $stmt->fetchAll();	?>
			
			<?php foreach ($resultado as $value) { ?> 
				<h2>Livro: <?= $value['LIVRO_NOME']; ?> </h2><br>
				<p>Tipo: <?= $value['LIVRO_TIPO']; ?></p>
				<p>Código: <?= $value['LIVRO_CODIGO']; ?></p>
				<p>Prazo de vencimento: 30 dias</p><br><br>
				<a href=confPed.php?i=<?= $value['LIVRO_CODIGO']; ?>>Concluir o pedido</a>
			


			<?php } }?>
		</center>
	</div>


	<div class="copyright">
	<p>©Copyright 2018</p>
	</div>


</body>
</html>