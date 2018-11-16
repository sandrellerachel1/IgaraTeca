<?php 
$prazo=7;
$dataexp=date('Y-m-d H:i:s', strtotime('+'. $prazo. ' day'));

echo $dataexp;
 ?>