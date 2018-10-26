<?php
session_start();
include('conexao.php');
if(!isset($_SESSION['usuario']) ){
	header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset=UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../css/css.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">
    <link rel="shortcut icon" type="image/x-png" href="../img/logo2.png">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">	
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>

</head>
<body>
	<a href="../index.php"><img src="../img/logo.png" id="logotipo" class="animated bounceInLeft"></a>
	<div class="home">
		<center>
			<ul><strong>
				<a type="button" class="menu" href="../index.php">Início</a>
				<a type="button" class="menu" href="livros.php">Livros</a>
				<a type="button" class="menu" href="funcionalidades.php">Funcionalidades</a>
			    <a type="button" class="menu" href="sobre.php">Sobre</a>
				<a type="button" class="menu" href="registro.php">Registrar-se</a>
				<a type="button" class="menu" href="listped.php">Pedidos</a>
				<a type="button" class="menu" id="usu" href="conta.php"><?= $_SESSION['usuario'];?></a>
				<a type="button" class="menu" href="logout.php">Sair</a>


			
			</strong></ul>
		</center><br><br><br>

	</div>

	
	<script>
		$(document).ready( function () {
    		$('#pedidos').DataTable({
    			"language": {
	            "lengthMenu": "Mostrando _MENU_ pedidos por página",
	            "zeroRecords": "Nada encontrado",
	            "info": "Monstrando página _PAGE_ de _PAGES_",
	            "infoEmpty": "Nenhum registro disponível",
	            "infoFiltered": "(filtrado de _MAX_ pedidos no total)"
        		}
    		} );

		} );
	</script>

		<center><div class="lista">
			<table id="pedidos">
				<thead>
					<tr>
						<td>ISBN</td>
						<td>Data</td>
						<td>Cod. Pedido</td>
						<td>Nome</td>
						<td>Matrícula</td>
						<td>E-mail</td>
					</tr>
				</thead>
				<tbody>
					<?php 
					$stmt=$pdo->prepare("SELECT * FROM pedido");
					$stmt->execute();
					$resultado=$stmt->fetchAll();
					foreach ($resultado as $value) { ?>

					<tr><?php $_SESSION['id_pedido']=$value['PED_USER_ID'];?>
						<td><?= $value['PED_COD_LIVRO']; ?></td>
						<td><?= $value['PED_DATA']; ?></td>
						<td><?= $value['PED_CODIGO']; ?></td>
					
					<?php 
					$stmt=$pdo->prepare("SELECT * FROM Usuario WHERE USER_ID=?");
					$stmt->execute([$_SESSION['id_pedido']]);
					$resultado=$stmt->fetchAll();
					foreach ($resultado as $value) {  ?>
					
					
						<td><?= $value['USER_NOME'];?> </td>
						<td><?= $value['USER_MATRICULA'];?> </td>
						<td><?= $value['USER_EMAIL']; ?></td>
					</tr>
					
				<?php unset($_SESSION['id_pedido']); } }?>
				</tbody>
			</table>
		
	</div></center>


</body>
</html>