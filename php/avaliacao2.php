<?php 
session_start();
include('conexao.php');
if (!isset($_SESSION['usuario'])){
	header('location: login.php');
	exit();
}

$estrela=$_POST['estrela'];
$codigo=$_POST['codigo']; //codigo do livro
$votos=1;
$stmt=$pdo->prepare("SELECT * FROM estoque WHERE EST_COD_LIVRO=?");
$stmt->execute([$codigo]);
$resultado=$stmt->fetchAll();
foreach ($resultado as $value) {
	$estrela+=$value['EST_ESTRELA'];
	$votos+=$value['EST_VOTOS'];
}
$media=$estrela/$votos;

$stmt=$pdo->prepare("UPDATE estoque SET EST_ESTRELA=?, EST_VOTOS=?, EST_MEDIA_VOTOS=? WHERE EST_COD_LIVRO=?");
$stmt->execute([$estrela, $votos, $media, $codigo]);


header("location: avaliacao.php?i=".$codigo);

 ?>