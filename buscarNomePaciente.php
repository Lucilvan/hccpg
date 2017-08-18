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

		//pegar nome do sexo
		$sqlS = "SELECT pac_nome FROM TB_PACIENTES;";
		$result = $con->query($sqlS);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo "<OPTION VALUE="">" .$row["pac_nome"]. "</OPTION>";
			}
		} else {
			echo "0 results";
		}
		mysqli_close($con);
	//}
?>