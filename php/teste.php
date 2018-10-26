<?php
session_start();
include("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset=UTF-8">
    <title>Login</title>
    
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">	
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>


</head>
<body>
	

		
			<table id="table" class="display">
				<thead>
					<tr>
						<th>ISBN</th>
						<th>Data</th>
						<th>Cod. Pedido</th>
						<th>Nome</th>
						<th>Matrícula</th>
						<th>E-mail</th>
					</tr>
				</thead>
				<tbody>
			
					<tr>
						<td>teste</td>
						<td>teste</td>
						<td>teste</td>
						<td>teste </td>
						<td>teste </td>
						<td>teste</td>
					</tr>
					<tr>
						<td>teste</td>
						<td>teste</td>
						<td>teste</td>
						<td>teste </td>
						<td>teste </td>
						<td>teste</td>
					</tr><tr>
						<td>teste</td>
						<td>teste</td>
						<td>teste</td>
						<td>teste </td>
						<td>teste </td>
						<td>teste</td>
					</tr>
				<tbody>
			</table>
 

	<script >
		$(document).ready( function () {
    		$('#table').DataTable();
		} );
	</script>

</body>
</html>