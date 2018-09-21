<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>my form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
	    <h1>Lista de Livros</h1>
	    <form method="POST" action="add.php">
	    	<input type="text" name="name" placeholder="Nome do Livro">
	    	<select name="type" placeholder="hehehe">
		    	<option value="" disabled="">Tipo de Livros</option>
		    	<option value="" disabled="">--</option>
		    	<option value="acao">Ação</option>
		    	<option value="romance">Romance</option>
		    	<option value="infantil">Infantil</option>
		    	<option value="didatico">Didático</option>
		    	
	        </select>
	            <textarea name="resumo" cols="30" rows="10" placeholder="Resumo"></textarea>
	            <input type="submit" value="enviar">
	    </form>
    <table class="weapons">
        <tbody>
		        <tr>
			       	<th>Nome</th>
			       	<th>Tipo do Livro</th>
			       	
			    </tr>
			        <?php
				      $filename='livro.csv';
				      $file=file($filename);

				      foreach($file as $key => $value){
				      $linha=explode(";", $file[$key]);
			    		echo '<tr>';
				    	echo '<td>'.$linha[0].'</td>';
				    	echo '<td>'.$linha[1].'</td>';
				    	
		        		echo '<td><a href=view.php?id='.$key.'>resumo</a></td>';
		        		echo '<td><a href=delete.php?id='.$key.'>remover</a></td>';
			      		echo '</tr>';
				    	};
			      	?>
		        
        </tbody>
    </table>

</body>
</html>