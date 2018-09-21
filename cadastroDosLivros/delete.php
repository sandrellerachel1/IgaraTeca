<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>my form</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="weapon">
	<?php
	$filename='livro.csv';
	$file=file($filename);
	$linha= fopen($file, "a");
	$remover=$_GET['id'];
	unset($file[$remover]);
	$data=implode('', $file);
	file_put_contents($filename, $data);
header('location: cadLivros.php');
?>
</div>
</body>
</html>