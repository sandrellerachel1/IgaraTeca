<?php
session_start();
include('conexao.php');
if (!isset($_POST['email']) || isset($_SESSION['usuario'])) {
	header('location: ../index.php');
	exit();
}
$senha=addslashes($_POST['senha1']);
$email=addslashes($_POST['email']);
$verifica=false;

if($_POST['senha1']!=$_POST['senha2']){
	$_SESSION['senhas_diferentes']=1;
	header('location: reset_password.php?i='.$email);
	exit();
}
else{
	$stmt=$pdo->prepare("SELECT * FROM USUARIOS");
	$stmt->execute();
	$resultado=$stmt->fetchAll();

	foreach ($resultado as $value) :
		if(md5($value['USER_EMAIL'])==$email){
			$verifica=true;
			$email=$value['USER_EMAIL'];
		
			if($value['USER_RESET_PW']==0){
				$_SESSION['link_expirou']=1;
				header('location: reset_password.php?i='.md5($email));
				exit();
			}
		}
	endforeach;

	if($verifica==true){
		$stmt=$pdo->prepare("UPDATE USUARIOS SET USER_SENHA=?, USER_RESET_PW=? WHERE USER_EMAIL=?");
		$stmt->execute([md5($senha), 0, $email]);

		$_SESSION['senha_redefinida']=1;
		header('location: login.php');
	}
}

?>