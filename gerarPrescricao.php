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
				
				<form action="classes/gerarPDF.php" role="form" method="post" name="form" id="form">
					<select name="nome" id="nome"> 
						<option>Paciente</option>

						<?php
							alimentarComboboxPaciente();
						?>
						
					</select>
					<input type="text" id="data" name="data" value="<?php echo $date;?>">
					<!-- Combo Data
					<select name="data" id="data"> 
						<option>Data</option>
					</select>
					-->
					<input type="submit" value="IMPRIMIR PRESCRIÇÃO">
				</form>

				<p><a id="button" href="menu.php"><< INDEX | &nbsp</a>
				<a id="button" href="cadastroPaciente.php">NOVO PACIENTE >></a></p>
				<br>
				<p><a id="button" href="http://www.freitassofthouse.com.br">Freitas SiftHouse</a> </p>
			</div>
		</div>

		<?php
		/*PHP para preencher o campo data verificar
			$nomePac = mysqli_real_escape_string( $con,$_GET['nome'] );

			$datas = array();

			$sql = "SELECT
						tb_prescricoes.pre_data as data
					FROM
						tb_prescricoes
					INNER JOIN
						tb_pacientes
					ON
						tb_pacientes.pac_codigo = tb_prescricoes.pre_pac_cod
					WHERE
						tb_pacientes.pac_nome = $nomePac
					GROUP BY
						tb_prescricoes.pre_data;";
			$res = mysqli_query( $con, $sql );
			while ( $row = mysqli_fetch_assoc( $res ) ) {
				$datas[] = array(
					'data'	=> $row['pre_data'],
					'data'	=> $row['pre_data'],
				);
			}

			echo( json_encode( $datas ) );
		*/
		?>
		<?php mysqli_close($con);?>
		<!-- AJAX para preencher o campo data verificar
		<script>
			$(function(){
				$('#nome').change(function(){
					if( $(this).val() ) {
						$('#data').hide();
						$('.carregando').show();
						$.getJSON('datas.ajax.php?search=',{data: $(this).val(), ajax: 'true'}, function(j){
							var options = '<option value=""></option>';	
							for (var i = 0; i < j.length; i++) {
								options += '<option value="' + j[i].nome + '">' + j[i].nome + '</option>';
							}	
							$('#data').html(options).show();
							$('.carregando').hide();
						});
					} else {
						$('#data').html('<option value="">-- Escolha uma data --</option>');
					}
				});
			});
		</script>
		-->
	</body>
</html>
