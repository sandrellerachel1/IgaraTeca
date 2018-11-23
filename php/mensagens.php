<?php 
session_start();
include('conexao.php');
$de=$_SESSION['id'];
$conversa=$_POST['conversacom'];
$stmt=$pdo->prepare("SELECT * FROM MENSAGENS WHERE MSG_DE=? AND MSG_PARA=?");
$stmt->execute([$de, $conversa]);

 ?>