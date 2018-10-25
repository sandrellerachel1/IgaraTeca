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
	$matricula=addslashes($_POST['matricula']);

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
			elseif ($_POST['matricula']==$value['USER_MATRICULA']) {
				$_SESSION['matricula']=1;
				header('location: registro.php');
				exit();	
			}
		}
	}


// Faz a verificação usando a função
if(filter_var($email, FILTER_VALIDATE_EMAIL)){
	$_SESSION['sucesso']=1;

	$stmt=$pdo->prepare("INSERT INTO Usuario SET USER_NOME= ?, USER_MATRICULA=?, USER_SENHA= ?, USER_EMAIL= ? ");
	$stmt->execute([$usuario, $matricula, $senha, $email]);
	
	//Envio de e-mail para confirmar o usuário 
	$assunto="Confirme seu cadastro";
	$id=$pdo->lastInsertId();
	$md5=md5($id);
	$link= "https://igarateca.000webhostapp.com/php/confirma.php?i=".$md5;
	$mensagem=" Clique aqui para confirmar seu cadastro  ".$link;
	$head="From: IGARATECA";
	mail($email, $assunto, $mensagem, $head);
	header('location: login.php');
	exit();
} 
else {
	$_SESSION['emailinvalido']=1;
	header('location: registro.php');
	exit();
}

	

 ?>