<?php
	include("jdbc.php");
	$con = conectar();

	// escape variables for security
	$nome = (integer) $_POST['nome'];
	$data = $_POST['data'];
	#$hora = $_POST['hora'];
	$prescricao = $_POST['prescricao'];
		
	$sql = "INSERT INTO tb_prescricoes (pre_data, pre_pac_cod, pre_prescricao) 
			VALUES ('$data', '$nome', '$prescricao') ";

	if (!mysqli_query($con,$sql)) {
		die('Error: ' . mysqli_error($con));
	}
	echo "Prescrição cadastrada com sucesso!";
	header("Location: ../novaPrescricao.php");
	mysqli_close($con);
?>