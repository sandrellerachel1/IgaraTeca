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
$stmt=$pdo->prepare("SELECT * FROM imagem WHERE IMG_NOME=?");
$stmt->execute([$newname]);
$resultado=$stmt->fetch();

foreach ($resultado as $value) {
	
$_SESSION['img']=$value['IMG_ID'];
}
$id=$_SESSION['img'];
$nome=addslashes($_POST['livro']);
$tipo=addslashes($_POST['tipo']);
$codigo=addslashes($_POST['codigo']);
$resumo=addslashes($_POST['resumo']);
$stmt=$pdo->prepare("INSERT INTO livro SET LIVRO_CODIGO=?, LIVRO_NOME=?, LIVRO_IMAGEM=?, LIVRO_TIPO=?, LIVRO_RESUMO=?");
$stmt->execute([$codigo, $nome, $id, $tipo, $resumo]);

header('location: livros.php');

 ?>