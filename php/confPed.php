<?php 
session_start();
include('conexao.php');

if(!isset($_SESSION['usuario'])){
	header('location: login.php');
	exit();
}

$usuario=$_SESSION['id'];
$i=addslashes($_GET['i']);

//Verifica se o usuário já possui algum pedido
$stmt=$pdo->prepare("SELECT * FROM PEDIDOS ");
$stmt->execute();
$resultado=$stmt->fetchAll();

foreach ($resultado as $value) {
	if ($usuario==$value['PED_USER_ID'] && $value['PED_DATA_PRAZO']>=date("Y-m-d H:i:s")) {
		$_SESSION['existepedido']=1;
		header('location: pedido.php');
		exit();
	}
}

//Pega a validade do livro
$stmt=$pdo->prepare("SELECT * FROM LIVROS WHERE LIVRO_CODIGO=?");
$stmt->execute([$i]);
$resultado=$stmt->fetchAll();

foreach ($resultado as $value) {
	$prazo=$value['LIVRO_PRAZO'];
}

//Registra o pedido	

$data=date('Y-m-d H:i:s');
$data2=date('i:s');
$dataexp=date('Y-m-d H:i:s', strtotime('+'.$prazo. ' day'));
$codigo=md5(base64_encode($data2.$usuario));
$codigo2=substr($codigo, -9);

$stmt=$pdo->prepare("INSERT INTO PEDIDOS SET PED_USER_ID=?, PED_COD_LIVRO=?, PED_STATUS=?, PED_DATA=?, PED_DATA_PRAZO=?, PED_CODIGO=? ");
$stmt->execute([$usuario, $i, 1, $data, $dataexp, $codigo2]);

if($stmt){
	$_SESSION['sucesso_pedido']=1;
	header('location: ../pdf/comprovante.php?i='.$i.'&j='.md5($data));
}

 ?>