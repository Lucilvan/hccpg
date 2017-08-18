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
		header("Location: novaPrescricao.php");
		mysqli_close($con);
	//}
?>