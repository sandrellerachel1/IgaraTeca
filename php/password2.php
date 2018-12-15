<?php
session_start();
include('conexao.php');
use PHPMailer\PHPMailer\PHPMailer;
require '../Mail/vendor/autoload.php';

if (!isset($_POST['email']) || isset($_SESSION['usuario'])){
	header('location: ../index.php');
	exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset=UTF-8">
    <title>Recuperar senha</title>
    <link rel="stylesheet" href="../css/css.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">
    <link rel="shortcut icon" type="image/x-png" href="../img/logo2.png">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../demo-files/demo.css">
	<script type="text/javascript" src="../js/jquery-latest.js"></script>
	<script type="text/javascript" src="../js/menu.js"></script>
	<script type="text/javascript" src="../js/avaliations.js"></script>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>

	<div class="home">
		<a href="../index.php"><img src="../img/logo3.png" id="logotipo" class="animated bounceInLeft"></a>
		<header>
		<div class="menu_bar">
			<a href="#" class="btn-menu"><span class="icon icon-menu"></span></a>
		</div>

			<nav>
				<ul>
					<li><a href="../index.php"><span class="icon icon-home"></span>Início</a></li>
					<li><a href="livros.php"><span class="icon icon-books"></span>Livros</a></li>
					<li><a href="sobre.php"><span class="icon icon-info"></span>Sobre</a></li>
					<li><a href="registro.php"><span class="icon icon-user-plus"></span>Registrar-se</a></li>
					<li><a href="login.php"><span class="icon icon-user"></span>Login</a></li>
				</ul>
			</nav>
		</header>
	</div>

	<div class="sobre">
		<center>
			<?php	
			$email=addslashes($_POST['email']);

			if(isset($_POST['email'])){
				$stmt=$pdo->prepare("SELECT * FROM USUARIOS");
				$stmt->execute();
				$resultado=$stmt->fetchAll();
				$verifica=false;

				foreach ($resultado as $value) :
					
					if($value['USER_EMAIL']==$email){
						$verifica=true;
						//Atualiza a coluna de redefinir a senha
						$stmt=$pdo->prepare("UPDATE USUARIOS SET USER_RESET_PW=? WHERE USER_EMAIL=?");
						$stmt->execute([1, $value['USER_EMAIL']]);
					}
					
				endforeach;
				
				if($verifica==true){
					echo '<span style="color: blue">E-mail para redifinição de senha enviado com sucesso! Verifique sua caixa de entrada.</span>';

						$data=date("d/m/Y");
						$md5=md5($email);
						$link= "https://igarateca.epizy.com/php/reset_password.php?i=".$md5;
						$mensagem=" Clique no link para redefinir sua senha  ".$link;

						$mail = new PHPMailer;
						$mail -> charSet = "UTF-8";
						$mail->isSMTP();
						$mail->Host = 'smtp.gmail.com';
						$mail->Port = 587;
						$mail->SMTPSecure = 'tls';
						$mail->SMTPAuth = true;
						$mail->Username = "igaratecasuporte@gmail.com";
						$mail->Password = "igara8643";
						$mail->setFrom('igaratecasuporte@gmail.com', 'Igarateca');
						$mail->addAddress($email);
						$mail->Subject = utf8_decode('Redefinição de senha ').$data;
						$mail->IsHTML(true);
						$mail->Body = $mensagem;
						$mail->AltBody = $mensagem;
						if(!$mail->send()) {
							 echo "Mailer Error: " . $mail->ErrorInfo;
						}
				}
				else{
					$_SESSION['email_invalido']=1;
					header('location: password.php');
				}
			}
				
			?>
			<br><br><form method="POST" action="password2.php">
				<input type="hidden" name="email" value="<?= $email; ?>">
				<input type="submit" value="Reenviar e-mail">
			</form>
		</center>
	</div>

	<div class="copyright">
	<p>©Copyright 2018</p>
	</div>
</body>
</html>