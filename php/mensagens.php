<?php 
session_start();
include('conexao.php');
$de=$_SESSION['id'];
$conversa=$_POST['conversacom'];
$stmt=$pdo->prepare("SELECT * FROM MENSAGENS WHERE MSG_DE=? AND MSG_PARA=? OR MSG_DE=? AND MSG_PARA=? ORDER BY MSG_ID DESC LIMIT 10");
$stmt->execute([$de, $conversa, $conversa, $de]);
$resultado=$stmt->fetchAll();

foreach ($resultado as $value) {
	if($de==$value['MSG_DE']){
		$janela_de=$value['MSG_PARA'];
	}
	elseif($de==$value['MSG_PARA']){
		$janela_de=$value['MSG_DE'];
	}

	$msg=$value['MSG_MENSAGEM'];
	$mensagens[]= array(
		'id' => $value['MSG_ID'],
		'mensagem' => utf8_encode($msg),
		'id_de' => $value['MSG_DE'],
		'id_para' => $value['MSG_PARA'],
		'janela_id' => $janela_de
	 );
}
if($stmt){
	echo 'true';
}
else{
	echo 'false';
}
	die(json_encode($mensagens));



?>