<?php 
session_start();
include('conexao.php');
if (!isset($_SESSION['usuario']) || !empty($_SESSION['usuario']) ){
	header('location: login.php');
	exit();
}

$estrela=$_POST['estrela'];
$codigo=$_POST['codigo'];
$stmt=$pdo->prepare("SELECT * FROM estoque WHERE EST_COD_LIVRO=? ");
$stmt->execute([$codigo]);
$resultado=$stmt->fetchAll();
foreach ($resultado as $value) {
	$_SESSION['codigo']=$value['EST_ESTRELA'];
}

$estrela2=$_SESSION['codigo']+$estrela;

$stmt=$pdo->prepare("UPDATE estoque SET EST_ESTRELA=? WHERE EST_COD_LIVRO=?");
$stmt->execute([$estrela2, $codigo]);
unset($_SESSION['codigo']);
header("location: avaliacao.php?i=".$codigo);
 
 ?>