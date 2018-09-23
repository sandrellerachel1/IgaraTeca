<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset=UTF-8">
    <title>Cadastro de Livros</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
	<div id="menu">

		<ul>
			<strong>
				<li><a href="index.php">Início</a></li>
				<li><a href="cadLivros.php">Livros</a></li>
				<li><a href="motivo.php">Motivos</a></li>
				<li><a href="sobre.php">Sobre</a></li>
				<li><a href="desenvolvedores.php">Desenvolvedores</a></li>
				<li><a href="#">Login</a></li>
			</strong>
		</ul>
	</div>
	
	<div id="livro"><center>
	    <h1>Cadastro de Livros</h1>
	    <form method="POST" action="add.php">
	    	<input type="text" name="name" placeholder="Nome do Livro" required="">
	    	<select name="type">
		    	<option value="" disabled="">Tipo de Livros</option>
		    	<option value="" disabled="">--</option>
		    	<option value="acao">Ação</option>
		    	<option value="romance">Romance</option>
		    	<option value="infantil">Infantil</option>
		    	<option value="didatico">Didático</option>
		    	</select>
	            <textarea name="resumo" cols="30" rows="10" placeholder="Resumo"></textarea>
	            <input type="submit" value="Enviar">
	    </form><br>

	    <p><a class="vol" href="livros.php">Lista de livros</a></p>
	</center></div>

			
</body>
</html>