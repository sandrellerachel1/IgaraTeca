<?php
session_start();
include('conexao.php');
use Dompdf\Dompdf; //referenciar o DomPDF com namespace
require_once 'dompdf/autoload.inc.php';
if (!isset($_SESSION['usuario'])) {
	header('location: login.php');
	exit();
}

$id=$_SESSION['id'];
$usuario=$_SESSION['usuario'];

if(isset($_SESSION['livro'])){ 
//colocando dados do usuário para o pdf
$stmt=$pdo->prepare("SELECT * FROM pedido WHERE PED_USER_ID= ? ");
$stmt->execute([$id]);
$html='';
$resultado=$stmt->fetchAll();
	foreach ($resultado as $value){
		$html.= "<h3 style=\"color: blue; margin-top: 20px; margin-bottom: 50px; font-weight: bold;\">Cod. Pedido: ".$value['PED_CODIGO']."</h3><hr>";
	}

$stmt=$pdo->prepare("SELECT * FROM Usuario WHERE USER_ID= ? ");
$stmt->execute([$id]);
$resultado=$stmt->fetchAll();
foreach ($resultado as $value) {
	$html.="<p>Nome do usuário: ".$value['USER_NOME']."</p>";
	$html.="<p>Matrícula: ".$value['USER_MATRICULA']."</p>";
	$html.="<p>E-mail do usuário: ".$value['USER_EMAIL']."</p><br><hr>";
}


//colocando dados do livro solicitado para o pdf
$livro=$_SESSION['livro'];
$stmt=$pdo->prepare("SELECT * FROM livro WHERE LIVRO_CODIGO= ? ");
$stmt->execute([$livro]);
$resultado=$stmt->fetchAll();
foreach ($resultado as $value) {
	$html.="<p>Nome do livro: ".$value['LIVRO_NOME']."</p>";
	$html.="<p>Tipo do livro: ".$value['LIVRO_TIPO']."</p>";
	$html.="<p>Autor do livro: ".$value['LIVRO_AUTOR']."</p>";
	$html.= "<p>ISBN do livro: ".$value['LIVRO_CODIGO']."</p><br><hr>";
}

//colocando os dados do pedido no pdf
$stmt=$pdo->prepare("SELECT * FROM pedido WHERE PED_USER_ID= ? ");
$stmt->execute([$id]);
$resultado=$stmt->fetchAll();
	foreach ($resultado as $value){
		$html.= "<p>Data de solicitação: ".$value['PED_DATA']."</p>";
		$html.= "<p>Data do prazo para devolução: ".$value['PED_DATA_PRAZO']."</p><br><hr>";
		$html.="<p>OBS: Você poderá fazer a renovação no máximo 3 </p>vezes";
	}
	
$mensagem="<center><img src=\"../img/logo.png\" id=\"logotipo\"></a></center><br>".
	"<h1 style=\"text-align:center;\">Comprovante de solicitação</h1><br><br><br>".$html;

	//$head="From: IGARATECA";
	$dompdf= new DOMPDF();
	$dompdf->load_html($mensagem); //carregar o html
	$dompdf->render();  //Renderizar o html
	//exibir a página
	$dompdf->stream('Comprovante.pdf',
	array(
		"Attachment"=>true
	)
	);
	
 unset($_SESSION['livro']);
 header('location: livros.php')
} 
else{
	header('location: ../index.php');
}

?>