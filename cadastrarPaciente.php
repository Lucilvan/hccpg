<?php
	//function cadastrar(){
		$hostname_MySql = "us-cdbr-iron-east-05.cleardb.net";  // Servidor
		$database_MySql = "heroku_3e2f3c7b538415b?reconnect=true"; // banco de dados
		$username_MySql = "bf1886c2887a04"; // Usuario
		$password_MySql = "52d302f7";  // senha
		//$hostname_MySql = "localhost";  // Servidor
		//$database_MySql = "hccpg"; // banco de dados
		//$username_MySql = "root"; // Usuario
		//$password_MySql = "";  // senha*/
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