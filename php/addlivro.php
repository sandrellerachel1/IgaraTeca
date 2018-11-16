<?php 
session_start();
include('conexao.php');

$stmt=$pdo->prepare("SELECT * FROM ESTOQUE");
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
$stmt=$pdo->prepare("INSERT INTO IMAGENS SET IMG_NOME=?");
$stmt->execute([$newname]);
move_uploaded_file($arquivo['tmp_name'], $diretorio.$newname);

//pegando a imagem e inserindo ao livro
$stmt=$pdo->prepare("SELECT * FROM IMAGENS ");
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
$quantidade=addslashes($_POST['quantidade']);
$prazo=addslashes($_POST['prazo']);
$resumo=addslashes($_POST['resumo']);
$stmt=$pdo->prepare("INSERT INTO LIVROS SET LIVRO_CODIGO=?, LIVRO_NOME=?, LIVRO_IMAGEM=?, LIVRO_TIPO=?, LIVRO_AUTOR=?, LIVRO_PRAZO=?, LIVRO_RESUMO=?");
$stmt->execute([$codigo, $nome, $id, $tipo, $autor, $prazo, $resumo]);
unset($_SESSION['img']);

//ESTOQUE DO LIVRO
$stmt=$pdo->prepare("INSERT INTO ESTOQUE SET EST_COD_LIVRO=?, EST_QUANTIDADE=?");
$stmt->execute([$codigo, $quantidade]);

$stmt=$pdo->prepare("INSERT INTO AVALIACOES SET AVL_COD_LIVRO=?");
$stmt->execute([$codigo]);
header('location: livros.php');

 ?>