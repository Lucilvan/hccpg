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
				<p class="title">PRESCRIÇÃO MÉDICA</p>
				
				<?php
					$hostname_MySql = "localhost";  // Servidor
					$database_MySql = "hccpg"; // banco de dados
					$username_MySql = "root"; // Usuario
					$password_MySql = "";  // senha
				
					$con=mysqli_connect($hostname_MySql,$username_MySql,$password_MySql,$database_MySql);
					// Check connection
					if (mysqli_connect_errno())
					  {
					  echo "Failed to connect to MySQL: " . mysqli_connect_error();
					  }

					// Perform queries 
					$query = mysqli_query($con,"SELECT pac_codigo, pac_nome FROM tb_pacientes");
					
					date_default_timezone_set('America/Sao_Paulo');
					$date = date('d/m/Y');
				?>
				
				<form action="cadastrarPrescricao.php" role="form" method="post" name="form" id="form">
					<select name="nome"> 
						<option>Paciente</option>

						<?php while($paciente = mysqli_fetch_array($query)) { ?>
							<option value="<?php echo $paciente['pac_codigo'] ?>"><?php echo $paciente['pac_nome'] ?></option>
						<?php } ?>
						
					</select>
					<input type="text" id="data" name="data" value="<?php echo $date;?>">
					<!--
					<select name="hora"> 
						<OPTION VALUE="">Hora</OPTION> 
						<OPTION VALUE="1">1</OPTION> 
						<OPTION VALUE="2">2</OPTION> 
						<OPTION VALUE="3">3</OPTION> 
						<OPTION VALUE="4">4</OPTION> 
						<OPTION VALUE="5">5</OPTION> 
						<OPTION VALUE="6">6</OPTION> 
						<OPTION VALUE="7">7</OPTION> 
						<OPTION VALUE="8">8</OPTION> 
						<OPTION VALUE="9">9</OPTION> 
						<OPTION VALUE="10">10</OPTION> 
						<OPTION VALUE="11">11</OPTION> 
						<OPTION VALUE="12">12</OPTION> 
						<OPTION VALUE="13">13</OPTION> 
						<OPTION VALUE="14">14</OPTION> 
						<OPTION VALUE="15">15</OPTION> 
						<OPTION VALUE="16">16</OPTION> 
						<OPTION VALUE="17">17</OPTION> 
						<OPTION VALUE="18">18</OPTION> 
						<OPTION VALUE="19">19</OPTION> 
						<OPTION VALUE="20">20</OPTION> 
						<OPTION VALUE="21">21</OPTION> 
						<OPTION VALUE="22">22</OPTION> 
						<OPTION VALUE="23">23</OPTION> 
						<OPTION VALUE="0">0</OPTION> 
					</select>
					-->
					<TEXTAREA rows="3" name="prescricao" placeholder="Digite aqui a prescrição do horário escolhido acima."></TEXTAREA>
					
					<input type="submit" value="ADICIONAR">
				</form>
				<?php mysqli_close($con);?>
				<a id="button" href="gerarPrescricao.php">GERAR PRESCRIÇÃO</a></p>
				<!--<input type="submit" value="GERAR PRESCRIÇÃO">-->
				<p><a id="button" href="index.html"><< INDEX | &nbsp</a>
				<a id="button" href="cadastroPaciente.php">NOVO PACIENTE >></a></p>
				
				<p><a id="button" href="http://www.freitassofthouse.com.br">Freitas SiftHouse</a> </p>
			</div>
		</div>

	</body>
</html>
