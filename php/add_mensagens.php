<?php 
session_start();
include('conexao.php');
if (!isset($_SESSION['usuario'])) {
	header('location: login.php');
	exit();
}
if(isset($_POST['mensagem'])){
	$de=$_SESSION['id'];
	$para=(int)$_POST['para'];
	$mensagem=strip_tags(trim(filter_input(INPUT_POST, 'mensagem')));

	if($mensagem!=''){
		$horario=1;
		$teste=0;

		$stmt=$pdo->prepare("INSERT INTO MENSAGENS SET MSG_DE=?, MSG_PARA=?, MSG_MENSAGEM=?, MSG_HORARIO=?, MSG_LIDA=?");
		$stmt->execute([$de, $para, $mensagem, $horario, $teste]);

		if($stmt){
			echo 'ok';
		}
		else{
			echo 'no';
		}
	}
}

?>
