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
			<img src="images/hccpg.jpg" alt="Katerynne Bruzzi" width="100px">
			<div class="container">
				<h1>HCCPG</h1>
				<p class="title">PRESCRIÇÃO MÉDICA</p>
				
				<?php
					$hostname_MySql = "us-cdbr-iron-east-05.cleardb.net";  // Servidor
					$database_MySql = "heroku_3e2f3c7b538415b"; // banco de dados
					$username_MySql = "bf1886c2887a04"; // Usuario
					$password_MySql = "52d302f7";  // senha
					//$hostname_MySql = "localhost";  // Servidor
					//$database_MySql = "hccpg"; // banco de dados
					//$username_MySql = "root"; // Usuario
					//$password_MySql = "";  // senha*/
				
					$con=mysqli_connect($hostname_MySql,$username_MySql,$password_MySql,$database_MySql);
					// Check connection
					if (mysqli_connect_errno())
					  {
					  echo "Failed to connect to MySQL: " . mysqli_connect_error();
					  }

					// Perform queries 
					$cod_pac =4; //$_POST['nome'];
					$data = '16/08/2017';//$_POST['data'];
					$sqlI = "SELECT 
								tb_pacientes.pac_codigo as codigo,
								tb_pacientes.pac_nome as nome,
								tb_pacientes.pac_idade as idade,
								tb_sexos.sex_sexo as sexo,
								tb_prescricoes.pre_data as data,
								tb_prescricoes.pre_hora as hora,
								tb_prescricoes.pre_prescricao as prescricaoM
							FROM
								tb_pacientes
							INNER JOIN
								tb_prescricoes
							ON 
								tb_pacientes.pac_codigo = tb_prescricoes.pre_pac_cod
							INNER JOIN
								tb_sexos
							ON 
								tb_pacientes.pac_sex_cod = tb_sexos.sex_codigo
							WHERE
								tb_pacientes.pac_codigo = '$cod_pac' and tb_prescricoes.pre_data = '$data';";
					
					$queryIn = mysqli_query($con,$sqlI);			
					
					$paciente = mysqli_fetch_array($queryIn);
					$codigo = $paciente['codigo'];
					$data = $paciente['data'];
				?>
				
				<?php while($paciente = mysqli_fetch_array($queryIn)) { ?>
					<p> <?php echo $paciente['nome'] ?> | <?php echo $paciente['idade'] ?></option>
				<?php } ?>
				
				<?php mysqli_close($con);?>

				<p><a href="gerarPDF.php" onclick="gerar($codigo, $data);">Teste onclick</a></p>
				<p><a id="button" href="index.html"><< INDEX | &nbsp</a>
				<a id="button" href="cadastroPaciente.php">NOVO PACIENTE >></a></p>
				<br>
				<p><a id="button" href="http://www.freitassofthouse.com.br">Freitas SiftHouse</a> </p>
			</div>
		</div>

	</body>
</html>
