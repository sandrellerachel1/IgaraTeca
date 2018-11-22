<?php 
session_start();
include("conexao.php");
$usuario=$_SESSION['id'];
$busca=$_POST['pedido'];
$teste=0;
	if(!empty($_POST['pedido'])):
	$stmt=$pdo->prepare("SELECT * FROM PEDIDOS WHERE PED_COD_LIVRO LIKE '%$busca%' AND PED_USER_ID=?");
	$stmt->execute([$usuario]);
	$resultado=$stmt->fetchAll();
	
	foreach ($resultado as $value) { $livro=$value['PED_COD_LIVRO']; $data=$value['PED_DATA']; $teste=1;?>
		<tr>
			<td><?=$value['PED_COD_LIVRO'];?> </td>
			<td><?=$value['PED_DATA'];?> </td>
			<td><?=$value['PED_CODIGO'];?> </td>
		<?php
		$stmt=$pdo->prepare("SELECT * FROM USUARIOS WHERE USER_ID=?");
		$stmt->execute([$value['PED_USER_ID']]);
		$resultado=$stmt->fetchAll();
			
		foreach ($resultado as $value) { ?>
			<td><?=$value['USER_NOME'];?> </td>;
			<td><?=$value['USER_MATRICULA'];?> </td>;
			<td><?=$value['USER_EMAIL'];?> </td>;
			<td><a href="comprovante.php?i=<?=$livro;?>&j=<?=md5($data);?>" class="icon icon-download">Baixar PDF</td>
		</tr>;
		<?php
		}
	}
	if($teste<1){
	$stmt=$pdo->prepare("SELECT * FROM PEDIDOS WHERE PED_CODIGO LIKE '%$busca%' AND PED_USER_ID=?");
	$stmt->execute([$usuario]);
	$resultado=$stmt->fetchAll();

	foreach ($resultado as $value) { $livro=$value['PED_COD_LIVRO']; $data=$value['PED_DATA']; $teste=1;?>
		<tr>
			<td><?=$value['PED_COD_LIVRO'];?> </td>
			<td><?=$value['PED_DATA'];?> </td>
			<td><?=$value['PED_CODIGO'];?> </td>
		
		<?php 
		$stmt=$pdo->prepare("SELECT * FROM USUARIOS WHERE USER_ID=?");
		$stmt->execute([$usuario]);
		$resultado=$stmt->fetchAll();

		foreach($resultado as $value){?>

			<td><?=$value['USER_NOME'];?> </td>
			<td><?=$value['USER_MATRICULA'];?> </td>
			<td><?=$value['USER_EMAIL'];?> </td>
			<td><a href="comprovante.php?i=<?=$livro;?>&j=<?=md5($data);?>" class="icon icon-download">Baixar PDF</td>
		</tr>
	<?php
		}
		
	}
}	
	if($teste<1){
	$stmt=$pdo->prepare("SELECT * FROM PEDIDOS WHERE PED_DATA LIKE '%$busca%' AND PED_USER_ID=?");
	$stmt->execute([$usuario]);
	$resultado=$stmt->fetchAll();

	foreach ($resultado as $value) { $livro=$value['PED_COD_LIVRO']; $data=$value['PED_DATA'];?>
		<tr>
			<td><?=$value['PED_COD_LIVRO'];?> </td>
			<td><?=$value['PED_DATA'];?> </td>
			<td><?=$value['PED_CODIGO'];?> </td>
		
		<?php 
		$stmt=$pdo->prepare("SELECT * FROM USUARIOS WHERE USER_ID=?");
		$stmt->execute([$usuario]);
		$resultado=$stmt->fetchAll();

		foreach($resultado as $value){?>

			<td><?=$value['USER_NOME'];?> </td>
			<td><?=$value['USER_MATRICULA'];?> </td>
			<td><?=$value['USER_EMAIL'];?> </td>
			<td><a href="comprovante.php?i=<?=$livro;?>&j=<?=md5($data);?>" class="icon icon-download">Baixar PDF</td>
		</tr>
<?php
		}
	}
}
	endif;


if(empty($busca)){
	$stmt=$pdo->prepare("SELECT * FROM PEDIDOS WHERE PED_USER_ID=?");
	$stmt->execute([$usuario]);
	$resultado=$stmt->fetchAll();

	foreach ($resultado as $value) { $livro=$value['PED_COD_LIVRO']; $data=$value['PED_DATA'];?>
		<tr>
			<td><?=$value['PED_COD_LIVRO'];?> </td>
			<td><?=$value['PED_DATA'];?> </td>
			<td><?=$value['PED_CODIGO'];?> </td>
		
		<?php 
		$stmt=$pdo->prepare("SELECT * FROM USUARIOS WHERE USER_ID=?");
		$stmt->execute([$usuario]);
		$resultado=$stmt->fetchAll();

		foreach($resultado as $value){?>

			<td><?=$value['USER_NOME'];?> </td>
			<td><?=$value['USER_MATRICULA'];?> </td>
			<td><?=$value['USER_EMAIL'];?> </td>
			<td><a href="comprovante.php?i=<?=$livro;?>&j=<?=md5($data);?>" class="icon icon-download">Baixar PDF</td>
		</tr>
<?php 
		}
	}
}
?>
