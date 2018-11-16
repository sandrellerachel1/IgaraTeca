<?php 
session_start();
include('conexao.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/css.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">
    <link rel="shortcut icon" type="image/x-png" href="../img/logo2.png">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	
	<link rel="stylesheet" type="text/css" href="../demo-files/demo.css">
	<script type="text/javascript" src="../js/menu.js"></script>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Teste</title>
</head>
<body>
	<center>
		<form id="pesquisa" action="" method="POST" enctype="multipart/form-data">
			<input type="text"  name="busca" id="input" autocomplete="off">
		</form>
		<hr>

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
					$stmt=$pdo->prepare("SELECT * FROM pedido");
					$stmt->execute();
					$resultado=$stmt->fetchAll();
					
					foreach ($resultado as $value) { $livro=$value['PED_COD_LIVRO'];?>
						
						<tr>
							<td><?= $value['PED_COD_LIVRO']; ?></td>
							<td><?= $value['PED_DATA']; ?></td>
							<td><?= $value['PED_CODIGO']; ?></td>
					
						<?php 
						$stmt=$pdo->prepare("SELECT * FROM Usuario WHERE USER_ID=?");
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
					var teste=document.getElementById("input").value.toLowerCase();
					/*var busca= $(this).val();
					var conta= $(this).val().length;*/

					if(teste>=0){
						$.post('pesquisa.php', { pedido:teste }, function(retorna){
							$("#tbody").html(retorna);
						});
					}
					else{
						$("#tbody").html('');
					}
					
				});
			});
		</script>
	
</body>
</html>