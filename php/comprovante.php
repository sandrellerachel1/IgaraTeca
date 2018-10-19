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
$stmt=$pdo->prepare("SELECT * FROM Usuario WHERE USER_ID= ? ");
$stmt->execute([$id]);
$resultado=$stmt->fetchAll();
$html='';
foreach ($resultado as $value) {
	$html.="Nome do usuário: ".$value['USER_NOME']."<br>";
	$html.="Matrícula: ".$value['USER_MATRICULA']."<br>";
	$html.="E-mail do usuário: ".$value['USER_EMAIL']."<br><hr>";
}


//colocando dados do livro solicitado para o pdf
$livro=$_SESSION['livro'];
$stmt=$pdo->prepare("SELECT * FROM livro WHERE LIVRO_CODIGO= ? ");
$stmt->execute([$livro]);
$resultado=$stmt->fetchAll();
foreach ($resultado as $value) {
	$html.="Nome do livro: ".$value['LIVRO_NOME']."<br>";
	$html.="Tipo do livro: ".$value['LIVRO_TIPO']."<br>";
	$html.="Autor do livro: ".$value['LIVRO_AUTOR']."<br>";
	$html.= "ISBN do livro: ".$value['LIVRO_CODIGO']."<br><hr>";
}

//colocando os dados do pedido no pdf
$stmt=$pdo->prepare("SELECT * FROM pedido WHERE PED_USER_ID= ? ");
$stmt->execute([$id]);
$resultado=$stmt->fetchAll();
	foreach ($resultado as $value){
		$html.= "Data de solicitação: ".$value['PED_DATA']."<br>";
		$html.= "Data do prazo para devolução: ".$value['PED_DATA_PRAZO']."<br><hr>";
		$html.="OBS: Você poderá fazer a renovação no máximo 3 vezes";
	}
	
$mensagem="<center><img src=\"../img/logo.png\" id=\"logotipo\"></a></center><br>".
	"<h1 style=\"text-align:center;\">Comprovante de solicitação</h1><br><br><br><hr>".$html;

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
	echo '<script type="text/javascript">
	alert("Pedido realizado com sucesso! Um comprovante foi gerado.");
	</script>';
	redirect('location: livros.php');
} 
else{
	header('location: ../index.php');
}

?>