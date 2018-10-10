<?php 
session_start();
include('conexao.php');
if(!isset($_SESSION['usuario'])){
	header('location: login.php');
	exit();
}

$usuario=$_SESSION['id'];
$i=$_GET['i'];
$data=date('Y-m-d H:i:s', strtotime('+7 day'));
$stmt = $pdo->prepare("INSERT INTO pedido SET PED_USER_ID='$usuario', PED_LIVRO_CODIGO='$i', PED_STATUS='1', PED_DATA='$data' ");
$stmt ->execute();
$_SESSION['pedido']=1;
header('location: pedido.php');

 ?>