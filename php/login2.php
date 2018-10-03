<?php 
session_start();
include('conexao.php');

	$usuario= addslashes($_POST['usuario']);
	$senha=md5(addslashes($_POST['senha']));
	$sql=$pdo->query("SELECT * FROM Usuario WHERE USER_NOME='$usuario' and USER_SENHA='$senha' and USER_STATUS='1'");

	if($sql->rowCount()>0){
		$_SESSION['usuario']=$usuario;
		header('location:../index.php');
		exit();
	}
	else{
		header('location: login.php');
		exit();
	}
?>