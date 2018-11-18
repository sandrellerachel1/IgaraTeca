<?php 
session_start();
include("conexao.php");
$usuario=$_SESSION['id'];
	$busca=$_POST['pedido'];

	if(!empty($_POST['pedido'])){
	$stmt=$pdo->prepare("SELECT * FROM PEDIDOS WHERE PED_USER_ID=?");
	$stmt->execute([$usuario]);
	$resultado=$stmt->fetchAll();
	
	foreach ($resultado as $value) {
		echo "<tr><td>".$value['PED_COD_LIVRO']."</td>";
		echo "<td>".$value['PED_DATA']."</td>";
		echo "<td>".$value['PED_CODIGO']."</td>";
$stmt=$pdo->prepare("SELECT * FROM USUARIOS WHERE USER_ID LIKE '%$busca%'");
$stmt->execute();
$resultado=$stmt->fetchAll();
	
	foreach ($resultado as $value) {
		echo "<td>".$value['USER_NOME']."</td>";
		echo "<td>".$value['USER_MATRICULA']."</td>";
		echo "<td>".$value['USER_EMAIL']."</td>";
		echo "<td>"."Baixar PDF"."</td></tr>";
	}
	}
}






?>
