<?php 
include('conexao.php');

$livro=addslashes($_POST['livro']);
$tipo=addslashes($_POST['tipo']);
$codigo=addslashes($_POST['codigo']);
$resumo=addslashes($_POST['resumo']);

$pdo->query("INSERT INTO livro SET LIVRO_CODIGO='$codigo', LIVRO_NOME='$livro', LIVRO_TIPO='$tipo', LIVRO_RESUMO='$resumo'");
header('location: livros.php');


 ?>