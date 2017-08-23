<?php
	include('jdbc.php');
	$con = conectar();

	//Alimentar as váriaveis com os campos do form
	$nome = $_POST['nome'];
	$idade = $_POST['idade'];
	$sexo = (integer) $_POST['sexo'];
	
	$sql="INSERT INTO tb_pacientes (pac_idade, pac_nome, pac_sex_cod)
		VALUES ('$idade', '$nome', '$sexo')";

	if (!mysqli_query($con,$sql)) {
	  die('Error: ' . mysqli_error($con));
	}
	echo "Paciente cadastrado com sucesso!";
	header("Location: ../menu.php");
	mysqli_close($con);
?>