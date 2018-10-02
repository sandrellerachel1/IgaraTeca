<?php 
//include('conexao.php');
$host= "mysql:dbname=id7242212_igarateca;host=localhost";
$usuariobd="id7242212_admin";
$senhabd="647298";

	try{
		$pdo=new PDO($host, $usuariobd, $senhabd);
	}

	catch(PDOExecption $e){
		echo "Falha: ". $e->getMessage();
	}

	if(empty($_POST['usuario']) || empty($_POST['senha']) || empty($_POST['email'])){
		header('location: registro.php');
		exit();
	}
	elseif ($_POST['senha'] != $_POST['senha2']) {
		header('location: registro.php');
		exit();
	}

	$usuario= addslashes($_POST['usuario']);
	$senha=md5(addslashes($_POST['senha']));
	$email=addslashes($_POST['email']);

	$pdo->query("INSERT INTO Usuario SET USER_NOME='$usuario', USER_SENHA='$senha', USER_EMAIL='$email'");

	header('location:login.php');

 ?>