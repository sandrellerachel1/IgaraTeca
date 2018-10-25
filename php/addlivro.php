<?php 
session_start();
include('conexao.php');

$stmt=$pdo->prepare("SELECT * FROM estoque");
$stmt->execute();
$resultado=$stmt->fetchAll();

foreach ($resultado as $value) {
	if ($_POST['codigo']==$value['EST_COD_LIVRO']) {
		$_SESSION['livro_existe']=1;
		header('location: cadLivros.php');
		exit();
	}
}

//salva a imagem no servidor
$arquivo=$_FILES['arquivo'];
$extensao=strtolower(substr($arquivo['name'], -4));
$newname=substr(md5(time()), -12). $extensao;
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
$autor=addslashes($_POST['autor']);
$codigo=addslashes($_POST['codigo']);
$resumo=addslashes($_POST['resumo']);
$stmt=$pdo->prepare("INSERT INTO livro SET LIVRO_CODIGO=?, LIVRO_NOME=?, LIVRO_IMAGEM=?, LIVRO_TIPO=?, LIVRO_AUTOR=?, LIVRO_RESUMO=?");
$stmt->execute([$codigo, $nome, $id, $tipo, $autor, $resumo]);
unset($_SESSION['img']);

$stmt=$pdo->prepare("INSERT INTO estoque SET EST_COD_LIVRO=?, EST_QUANTIDADE=?, EST_ESTRELA=? ");
$stmt->execute([$_POST['codigo'], 10, 0]);
header('location: livros.php');

 ?>