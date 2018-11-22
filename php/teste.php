<?php

include('conexao.php');
use Dompdf\Dompdf; //referenciar o DomPDF com namespace
require_once '../dompdf/autoload.inc.php';


		//colocando dados do usuário para o pdf
		$stmt=$pdo->prepare("SELECT * FROM PEDIDOS WHERE PED_USER_ID= ? ");
		$stmt->execute([$id]);
		$html="DADOS PESSOAIS<hr>
 Endereço: Rua Lajes, 18<br>
Vila Rural - Igarassu - PE - Cep: 53650-630<br>
 Telefone: (81) 99293-1694 <br>
 E-mail: alessandrosilva325@gmail.com<br>
 Estado Civil: Solteiro<br>
 Data de Nascimento: 18/03/1999<br>
 Nacionalidade: Brasil<br><br><br>
OBJETIVO<hr>
 Crescer profissionalmente e de maneira produtiva, contribuindo para o desenvolvimento da organização como um todo.<br><br><br><br>
ESCOLARIDADE<hr>
 Ensino Médio - Completo<br><br><br><br>
CURSOS<hr>
 Informática <br>
 Cursando Informática para Internet<br><br>";
		
		$mensagem="<center><br><br><h2>Alessandro José de Souza Silva</center></h2><br><br>".$html;
			

			$dompdf= new DOMPDF();
			$dompdf->load_html($mensagem); //carregar o html
			$dompdf->render();  //Renderizar o html
			//exibir a página
			$dompdf->stream('Comprovante.pdf',
			array(
				"Attachment"=>true
			)
			);


?>