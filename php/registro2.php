<?php 
session_start();
include('conexao.php');
use PHPMailer\PHPMailer\PHPMailer;
require '../Mail/vendor/autoload.php';

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
	$stmt=$pdo->prepare("SELECT * FROM USUARIOS");
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
	$_SESSION['cadastro_sucesso'] = 1;

	$stmt=$pdo->prepare("INSERT INTO USUARIOS SET USER_NOME= ?, USER_MATRICULA=?, USER_SENHA= ?, USER_EMAIL= ? ");
	$stmt->execute([$usuario, $matricula, $senha, $email]);

	//Envio de e-mail para confirmar o usuário 
	$id=$pdo->lastInsertId();
	$md5=md5($id);
	$link= "https://igarateca.epizy.com/php/confirma.php?i=".$md5;
	$mensagem=" Clique no link para confirmar seu cadastro  ".$link;

	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;
	$mail->Username = "igaratecasuporte@gmail.com";
	$mail->Password = "igara8643";
	$mail->setFrom('igaratecasuporte@gmail.com', 'Igarateca');
	$mail->addAddress($email, $usuario);
	$mail->Subject = 'Confirme seu cadastro no Igarateca'.$data;
	$mail->IsHTML(true);
	$mail->Body = $mensagem;
	$mail->AltBody = $mensagem;
	if(!$mail->send()) {
	    echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
	   header('location:login.php');
	}
} 
else {
	$_SESSION['emailinvalido']=1;
	header('location: registro.php');
	exit();
}

	

 ?>