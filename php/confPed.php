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
$stmt=$pdo->prepare("SELECT * FROM pedido ");
$stmt->execute();
$resultado=$stmt->fetchAll();

foreach ($resultado as $value) {
	if ($usuario==$value['PED_USER_ID'] && $value['PED_DATA_PRAZO']>=date("Y-m-d H:i:s")) {
		//if ($stmt>=1) {
			$_SESSION['existepedido']=1;
			header('location: pedido.php');
			exit();
		//}
		
	}
}



//Registra o pedido	

$data=date('Y-m-d H:i:s');
$dataexp=date('Y-m-d H:i:s', strtotime('+7 day'));
$stmt = $pdo->prepare("INSERT INTO pedido SET PED_USER_ID='$usuario', PED_LIVRO_CODIGO='$i', PED_STATUS='1', PED_DATA='$data', PED_DATA_PRAZO='$dataexp' ");
$stmt ->execute();
$_SESSION['pedido']=1;?>

<?php


	//$id=$pdo->lastInsertId();
	//$md5=md5($id);
	
	//$head="From: IGARATECA";
	
	//mail($email, $assunto, $mensagem, $head);

header('location: comprovante.php');

 ?>