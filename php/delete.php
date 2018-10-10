<?php
include('conexao.php');
$i=$_GET['i'];
$stmt=$pdo->prepare("DELETE FROM livro WHERE LIVRO_CODIGO='$i'");
$stmt->execute();
header('location: livros.php');
?>