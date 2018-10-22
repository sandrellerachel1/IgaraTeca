<?php
session_start();
include('conexao.php');
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
		</ul></center>

	</div><br>

	<div class="livro" style="margin-top: 60px;">

	<?php
		if(isset($_SESSION['usuario']) && $_SESSION['usuario']=='Teste'){ 
			header("location: ../index.php"); 
			exit();
		}
	?>

			<?php
				$get=$_GET['i'];
				$stmt = $pdo->prepare("SELECT * FROM livro WHERE LIVRO_CODIGO=?");
				$stmt ->execute([$get]);
				$resultado = $stmt->fetchAll();
				foreach ($resultado as $value) : $codigo=$value['LIVRO_CODIGO']?>
				<br><div class="grid" ">
					
					<p>Nome: <?= $value['LIVRO_NOME'];?></p>
					<p>Autor: Fulano</p>
					<p>Tipo: <?=$value['LIVRO_TIPO']; ?></p>
					<p>ISBN: <?=$value['LIVRO_CODIGO']; ?></p>


					<?php 
						$codigo=$value['LIVRO_CODIGO'];
						$id=$value['LIVRO_IMAGEM'];
						$local="../img/livros/";
						$stmt=$pdo->prepare("SELECT * FROM imagem WHERE IMG_ID=?");
						$stmt->execute([$id]); 
						$resultado=$stmt->fetchAll();
						foreach ($resultado as $value) { 
							$imagem=$local.$value['IMG_NOME']?>
						<a href="view.php?i=<?= $codigo; ?>"><img src="<?= $imagem; ?>" style="margin-top: -75px;" ></a>
						<p><form method="POST" action="avalicao2.php" enctype="multipart/form-data">
									<div class="estrelas" style="border: none;">
										<input type="radio" id="vazio" name="estrela" value="" checked>

										<label for="estrela_um"><i class="fa"></i></label>
										<input type="radio" id="estrela_um" name="estrela" value="1">

										<label for="estrela_dois"><i class="fa"></i></label>
										<input type="radio" id="estrela_dois" name="estrela" value="2">

										<label for="estrela_tres"><i class="fa"></i></label>
										<input type="radio" id="estrela_tres" name="estrela" value="3">

										<label for="estrela_quatro"><i class="fa"></i></label>
										<input type="radio" id="estrela_quatro" name="estrela" value="4">

										<label for="estrela_cinco"><i class="fa"></i></label>
										<input type="radio" id="estrela_cinco" name="estrela" value="5"><br>

										<input type="submit" value="Avaliar">
									</div>
									
								</form></p>

					<?php }?>

				</div>
			<?php endforeach ?>

	</div>

	<div class="copyright">
	<p>©Copyright 2018</p>
	</div>

</body>
</html>