<?php 
session_start();
include('conexao.php');

	$usuario= addslashes($_POST['usuario']);
	$senha=md5(addslashes($_POST['senha']));
	$stmt=$pdo->prepare("SELECT * FROM Usuario ");
	$stmt ->execute();
	$resultado = $stmt->fetchAll();
					 
	foreach ($resultado as $value) {
		if($value['USER_NOME']==$usuario && $value['USER_SENHA']==$senha && $value['USER_STATUS']=='1'){
			$_SESSION['usuario']=$usuario;
			$_SESSION['id']=$value['USER_ID'];

			header('location:../index.php');
			exit();
		}
	}

	
		$_SESSION['naoexiste']=1;
		header('location: login.php');
		exit();


?>