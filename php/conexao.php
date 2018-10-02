<?php
$host= "mysql:dbname=igarateca;host=localhost";
$usuariobd="teste";
$senhabd="647298";

	try{
		$pdo=new PDO($host, $usuariobd, $senhabd);
	}

	catch(PDOExecption $e){
		echo "Falha: ". $e->getMessage();
	}


?>