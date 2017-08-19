<?php
	//function cadastrar(){
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