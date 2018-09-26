<?php
	$filename='livro.csv';
	$file=file($filename);
	//$linha= fopen($file, "a");
	$remover=$_GET['id'];
	unset($file[$remover]);
	$data=implode('', $file);
	file_put_contents($filename, $data);
header('location: livros.php');
?>