<?php 
	$name=$_POST["name"];
	$resumo=$_POST["resumo"];
	$type=$_POST['type'];
	$filename="livro.csv";
    $handle= fopen($filename, 'a');
	fwrite($handle, $name.";;;". $type.";;;". $resumo. ";;;". "\n");
	header("location:cadLivros.php")
 ?>