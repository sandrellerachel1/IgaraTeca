<?php 
session_start();
include('conexao.php');

	if(empty($_POST['usuario']) || empty($_POST['senha']) || empty($_POST['email'])){
		header('location: registro.php');
		exit();
	}
	elseif ($_POST['senha'] != $_POST['senha2']) {
		$_SESSION['senhas']=1;
		header('location: registro.php');
		exit();
	}

	$usuario= addslashes($_POST['usuario']);
	$senha=md5(addslashes($_POST['senha']));
	$email=addslashes($_POST['email']);

	//Verifica se o usuario ou email já existe
	$stmt=$pdo->prepare("SELECT * FROM Usuario");
	$stmt ->execute();
	$verifica=$stmt->fetchAll();
	
	if (isset($_POST['usuario'])) {
		foreach ($verifica as $value) {
			if($_POST['usuario']==$value['USER_NOME']){
				$_SESSION['user']=1;
				header('location: registro.php');
				exit();
			}
			elseif ($_POST['email']==$value['USER_EMAIL']) {
				$_SESSION['email']=1;
				header('location: registro.php');
				exit();
			}
		}
	}

	
	$_SESSION['sucesso']=1;

	$pdo->query("INSERT INTO Usuario SET USER_NOME='$usuario', USER_SENHA='$senha', USER_EMAIL='$email'");

	//Envio de e-mail para confirmar o usuário 
	$assunto="Confirme seu cadastro";
	$id=$pdo->lastInsertId();
	$md5=md5($id);
	$link= "https://igarateca.000webhostapp.com/php/confirma.php?i=".$md5;
	$mensagem=" Clique aqui para confirmar seu cadastro  ".$link;
	$head="From: IGARATECA";
	mail($email, $assunto, $mensagem, $head);
	
	header('location: login.php');

 ?>