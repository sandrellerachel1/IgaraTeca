<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Motivos</title>
	<link rel="stylesheet" type="text/css" href="../css/css.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">
	<link rel="shortcut icon" type="image/x-png" href="../img/logo2.png">
</head>
<body>
	<a href="../index.php"><img src="../img/logo.png" id="logotipo" class="animated bounceInLeft"></a>
	<div class="home">
		<center><ul>
			<strong>
				<a type="button" class="menu" href="../index.php">Início</a>
				<a type="button" class="menu" href="livros.php">Livros</a>
				<?php if(isset($_SESSION['usuario']) && $_SESSION['usuario']=='Teste'){
					echo '<a type="button" class="menu" href="cadLivros.php">Cadastro de livros</a>';
				} ?>
				<a type="button" class="menu" href="funcionalidades.php">Funcionalidades</a>
			    <a type="button" class="menu" href="sobre.php">Sobre</a>
				<?php
				if(isset($_SESSION['usuario'])){
					echo '<a type="button" class="menu" id="usu" href="conta.php">'.$_SESSION['usuario'].'</a>', PHP_EOL;
					echo '<a type="button" class="menu" href="logout.php">Sair</a>';
				}
				else{
					echo '<a type="button" class="menu" href="registro.php">Registrar-se</a>', PHP_EOL;
					echo '<a type="button" class="menu" href="login.php">Login</a>';
				}	
				?>
			
			</strong>
		</ul></center><br><br><br>

	</div><br>
	<div class="mot"><center>
		<h2>IgaraTeca</h2><br>
		<p> 
			Breve contexto:
			Criar um sistema automático que gerencie bibliotecas. O Sistema-de-gestão-para-
			bibliotecas gerencia o acervo de livros, permitindo cadastrar os empréstimos, devoluções
			e as baixas. E através da Internet é possível a consulta ao acervo listados por obra, aluno
			e outros parâmetros e a solicitação de reserva.
		</p><br>
			
		<p> Principais funcionalidades:</p><br>
			*Quanto ao Acervo:
			1 – Cadastro de usuários.
			O cadastro de usuários é uma importante fonte de informação para a gestão
			de controle dos exemplares emprestados pela biblioteca.
			2 - Cadastro de livros da biblioteca.
			Cadastro dos Livros da biblioteca, para controle dos itens do nosso acervo.
			*Quanto aos empréstimos:
			3 – Uso de etiquetas de código de barras.
			Facilitando e agilizando o empréstimo e devolução dos mesmos.
			4 – Gerenciar empréstimos, devoluções e reservas.
			Relacionando os usuários da biblioteca com os livros emprestados.
			5 - Emissão de comprovantes por e-mail.
			E-mail contendo o título, autor e ISBN do livro. Dados do usuário como
			nome, c.p.f. e e-mail. Quando da retirada: data de retirada e data de
			entrega, enviada.
			6 – comprovantes de retirada, 
			7- Comprovantes de devolução. Determina a
			data de devolução prevista, 
			8- Permitindo restringir os empréstimos para os
			usuários com multa. 
			9 - Calcula automaticamente multas a serem cobradas.
			10 - Gerencia as reservas por obra, autor e gênero. 
			11 - A solicitação pode ser feita pela Internet, 
			12- O sistema emite e-mail notificando que o livro já
			está disponível. 
			13- Permite visualização dos exemplares mais emprestados,
			14- Estatísticas dos temas mais procurados, 
			15- Apresentação de obras completas por autor, e busca por temas.
		</p><br>
	</center></div>

	<div class="copyright">
	<p>©Copyright 2018</p>
	</div>
</body>
</html>