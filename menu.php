<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/indexCss.css">
		<meta charset="UTF-8"> 
		<meta name="keywords" content="PMRN, Policia Militar, HPM, Protuário">
		<?php  
			include("classes/jdbc.php");
			verificarSessão();
		?>
	</head>
	<body>
		<br>

		<div class="card">
			<br>
			<img src="images/hccpg.jpg" alt="Katerynne Bruzzi" width="100px">
			<div class="container">
				<h1>HCCPG</h1>
				<p class="title">DASHBOAD</p>
				<p>
					<?php 
						echo " Bem vindo $logado";
					?>
					<a href="classes/sair.php"> | Sair</a>
				</p>
				<hr>
				<p><a id="button" href="cadastroPaciente.php">CADASTRAR PACIENTE</a></p>
				<p><a id="button" href="novaPrescricao.php">NOVA PRESCRIÇÃO</a></p>
				<p><a id="button" href="gerarPrescricao.php">IMPRIMIR PRESCRIÇÃO</a></p>
				<hr>	  
				<br><br><br><br><br><br><br><br><br>
				<p><a id="button" href="http://www.freitassofthouse.com.br">Freitas SiftHouse</a> </p>
			</div>
		</div>

	</body>
</html>