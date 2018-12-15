<?php 
include ('conexao.php');

//$data=date('Y-m-d');
/*
$stmt=$pdo->prepare('SELECT * FROM PEDIDOS');
$stmt->execute();
$resultado=$stmt->fetchAll();

foreach ($resultado as $value) {
	if($vale['PED_DATA_PRAZO']>$data){

	}	
}
*/
$data1 = "2015/02/20";
$data2 = "2015/03/20";
// converte as datas para o formato timestamp
$d1 = strtotime($data1); 
$d2 = strtotime($data2);
// verifica a diferença em segundos entre as duas datas e divide pelo número de segundos que um dia possui
$dataFinal = ($d2 - $d1) /86400;
$data= (int) $dataFinal;
// caso a data 2 seja menor que a data 1
$multa= 0.50;
$valor= 0.00;
echo $data2 .' - '. $data1.'<br>';
echo $data.' Dias'.'<br>';
if($data>=1){
	for($i=1; $i<=$data; $i++){
		$valor+= $multa;
	}
}
echo "Multas: R$: ".$valor." (R$: 0,50 ao dia)";
?>