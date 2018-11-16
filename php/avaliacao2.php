<?php 
session_start();
include('conexao.php');
if (!isset($_SESSION['usuario'])){
	header('location: login.php');
	exit();
}

$estrelas=$_POST['estrela'];
$codigo=$_POST['codigo']; //codigo do livro
$pessoas=1;
$stmt=$pdo->prepare("SELECT * FROM AVALIACOES WHERE AVL_COD_LIVRO=?");
$stmt->execute([$codigo]);
$resultado=$stmt->fetchAll();
foreach ($resultado as $value) {
	$estrelas+=$value['AVL_QTD_ESTRELA'];
	$pessoas+=$value['AVL_QTD_PESSOAS'];
}
$media=$estrelas/$pessoas;

$stmt=$pdo->prepare("UPDATE AVALIACOES SET AVL_QTD_ESTRELA=?, AVL_QTD_PESSOAS=?, AVL_MEDIA_VOTOS=? WHERE AVL_COD_LIVRO=?");
$stmt->execute([$estrelas, $pessoas, $media, $codigo]);


//header("location: avaliacao.php?i=".$codigo);

 ?>