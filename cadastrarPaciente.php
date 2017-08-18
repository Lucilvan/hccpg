<?php
	//function cadastrar(){
		/*$hostname_MySql = "us-cdbr-iron-east-05.cleardb.net";  // Servidor
		$database_MySql = "heroku_c727691b4562fa0"; // banco de dados
		$username_MySql = "b9a404ee30fcc5"; // Usuario
		$password_MySql = "5201fd8c";  // senha*/
		$hostname_MySql = "localhost";  // Servidor
		$database_MySql = "hccpg"; // banco de dados
		$username_MySql = "root"; // Usuario
		$password_MySql = "";  // senha*/
		$con=mysqli_connect($hostname_MySql,$username_MySql,$password_MySql,$database_MySql);

		// Check connection
		if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		// escape variables for security
		$nome = $_POST['nome'];
		$idade = $_POST['idade'];
		$sexo = (integer) $_POST['sexo'];
		
		$sql="INSERT INTO tb_pacientes (pac_idade, pac_nome, pac_sex_cod)
		VALUES ('$idade', '$nome', '$sexo')";

		if (!mysqli_query($con,$sql)) {
		  die('Error: ' . mysqli_error($con));
		}
		echo "Paciente cadastrado com sucesso!";
		header("Location: index.html");
		mysqli_close($con);
	//}
?>