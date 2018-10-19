<?php 
session_start();
include('conexao.php');
$usuario=$_SESSION['id'];
$senha=md5(addslashes($_POST['senha']));
$senha2=md5(addslashes($_POST['novasenha']));
$senha3=md5(addslashes($_POST['novasenha2']));

$stmt=$pdo->prepare('SELECT * FROM Usuario WHERE USER_ID=?');
$stmt->execute([$usuario]);
$resultado=$stmt->fetchAll();

foreach ($resultado as $value) {
	if ($senha==$value['USER_SENHA'] && $_POST['novasenha']==$_POST['novasenha2']){
		$stmt=$pdo->prepare('UPDATE Usuario SET USER_SENHA=? WHERE USER_ID=?');
		$stmt->execute([$senha2, $usuario]);
		$_SESSION['altera']=1;
		header('location: recupera.php');
		exit();
	}
	elseif($senha2!=$senha3){
		$_SESSION['diferente']=1;
		header('location: recupera.php');
		exit();
	}
	elseif($senha!=$value['USER_SENHA']){
		$_SESSION['incorreta']=1;
		header('location: recupera.php');
		exit();
	}

}



 ?>