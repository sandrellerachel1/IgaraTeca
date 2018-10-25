<?php
session_start();
include('conexao.php');
$i=$_GET['i'];

//pega a imagem do livro
$stmt=$pdo->prepare("SELECT * FROM livro");
$stmt->execute();
$resultado=$stmt->fetchAll();

foreach ($resultado as $value) {
	if($i==$value['LIVRO_CODIGO']){
	$_SESSION['imagem']=$value['LIVRO_IMAGEM'];
	}
}

//deleta a imagem no servidor
$imagem=$_SESSION['imagem'];
$stmt=$pdo->prepare("SELECT * FROM imagem WHERE IMG_ID=?");
$stmt->execute([$imagem]);
$resultado=$stmt->fetchAll();
$caminho='../img/livros/';
foreach ($resultado as $value) {
	$diretorio=$caminho.$value['IMG_NOME'];
	unlink($diretorio);
}

//deleta a imagem no banco de dados
$stmt=$pdo->prepare("DELETE FROM imagem WHERE IMG_ID=?");
$stmt->execute([$imagem]);
unset($_SESSION['imagem']);

//deleta o livro no banco de dados
$stmt=$pdo->prepare("DELETE FROM livro WHERE LIVRO_CODIGO=? ");
$stmt->execute([$i]);

//deleta o livro no estoque;
$stmt=$pdo->prepare("DELETE FROM estoque WHERE EST_COD_LIVRO=? ");
$stmt->execute([$i]);
header('location: livros.php');

?>