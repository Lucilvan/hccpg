<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/indexCss.css">
		<meta name="keywords" content="Gastronomia, Home Chef, Personal, Chef, Home, Bolos, Almoço, Amigos, Jantar, Lanche, Festas, Eventos, Culinária">
	</head>
	<body>
		<br>

		<div class="card">
		<br>
			<img src="images/hccpg.jpg" alt="Katerynne Bruzzi" width="100px">
			<div class="container">
				<h1>HCCPG</h1>
				<p class="title">CADASTRO DE PACIENTE</p>
				
				<form action="cadastrarPaciente.php" role="form" method="post" name="form" id="form">
					<input type="text" id="nome" name="nome" placeholder="Nome do Paciente">
					<input type="text" id="idade" name="idade" placeholder="Idade">
					<SELECT name="sexo"> 
						<OPTION VALUE="">Sexo</OPTION> 
						<OPTION VALUE="1">Masculino</OPTION> 
						<OPTION VALUE="11">Feminíno</OPTION> 
					</SELECT>
					
					<input type="submit" value="CADASTRAR">
					
				</form>
				<p><a id="button" href="index.html"><< INDEX | &nbsp</a>
				<a id="button" href="novaPrescricao.php">PRESCRIÇÃO >></a></p>
				<br>
					  
				<p><a id="button" href="http://www.freitassofthouse.com.br">Freitas SiftHouse</a> </p>
			</div>
		</div>

	</body>
</html>