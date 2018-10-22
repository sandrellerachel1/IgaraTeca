<?php 
session_start();
include('conexao.php');

//salva a imagem no servidor
$arquivo=$_FILES['arquivo'];
$extensao=strtolower(substr($arquivo['name'], -4));
$newname=md5(time()). $extensao;
$diretorio="../img/livros/";
$stmt=$pdo->prepare("INSERT INTO imagem SET IMG_NOME=?");
$stmt->execute([$newname]);
move_uploaded_file($arquivo['tmp_name'], $diretorio.$newname);

//pegando a imagem e inserindo ao livro
$stmt=$pdo->prepare("SELECT * FROM imagem ");
$stmt->execute();
$resultado=$stmt->fetchAll();

foreach ($resultado as $value) {
	if($newname==$value['IMG_NOME']){
$_SESSION['img']=$value['IMG_ID'];
}
}
$id=$_SESSION['img'];
$nome=addslashes($_POST['livro']);
$tipo=addslashes($_POST['tipo']);
$codigo=addslashes($_POST['codigo']);
$resumo=addslashes($_POST['resumo']);
$stmt=$pdo->prepare("INSERT INTO livro SET LIVRO_CODIGO=?, LIVRO_NOME=?, LIVRO_IMAGEM=?, LIVRO_TIPO=?, LIVRO_RESUMO=?");
$stmt->execute([$codigo, $nome, $id, $tipo, $resumo]);
unset($_SESSION['img']);

header('location: livros.php');

 ?>