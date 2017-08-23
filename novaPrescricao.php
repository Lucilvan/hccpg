<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/indexCss.css">
		<meta name="keywords" content="Gastronomia, Home Chef, Personal, Chef, Home, Bolos, Almoço, Amigos, Jantar, Lanche, Festas, Eventos, Culinária">
		<?php  
			include("classes/jdbc.php");
			verificarSessão();
			pegarData();
		?>
	</head>
	<body>
		<br>

		<div class="card">
		<br>
			<img src="images/hccpg.jpg" alt="Katerynne Bruzzi" width="100px">
			<div class="container">
				<h1>HCCPG</h1>
				<p class="title">PRESCRIÇÃO MÉDICA</p>
				<p>
					<?php 
						echo" Bem vindo $logado";
					?>
					<a href="classes/sair.php"> | Sair</a>
				</p>
				<form action="cadastrarPrescricao.php" role="form" method="post" name="form" id="form">
					<select name="nome"> 
						<option>Paciente</option>
						<?php
							alimentarComboboxPaciente();
						?>
						
					</select>
					<input type="text" id="data" name="data" value="<?php echo $date;?>">
					<TEXTAREA rows="3" name="prescricao" placeholder="Digite aqui a prescrição do horário escolhido acima."></TEXTAREA>
					<input type="submit" value="ADICIONAR">
				</form>

				<?php 
					fecharConexao($con);
				?>
				
				<a id="button" href="gerarPrescricao.php">GERAR PRESCRIÇÃO</a></p>
				<p><a id="button" href="menu.php"><< INDEX | &nbsp</a>
				<a id="button" href="cadastroPaciente.php">NOVO PACIENTE >></a></p>
				
				<p><a id="button" href="http://www.freitassofthouse.com.br">Freitas SiftHouse</a> </p>
			</div>
		</div>
	</body>
</html>
