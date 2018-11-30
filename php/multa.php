<?php 
include ('conexao.php');

$data=date('Y-m-d');
/*
$stmt=$pdo->prepare('SELECT * FROM PEDIDOS');
$stmt->execute();
$resultado=$stmt->fetchAll();

foreach ($resultado as $value) {
	if($vale['PED_DATA_PRAZO']>$data){

	}	
}
*/
$tade=date('Y-m-d', strtotime('+4 day'));
$teste= $tade diff->($data); 
echo $teste;
?>