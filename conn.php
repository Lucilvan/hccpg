$hostname_MySql = "us-cdbr-iron-east-05.cleardb.net";  // Servidor
$database_MySql = "heroku_3e2f3c7b538415b?reconnect=true"; // banco de dados
$username_MySql = "bf1886c2887a04"; // Usuario
$password_MySql = "52d302f7";  // senha
//$hostname_MySql = "localhost";  // Servidor
//$database_MySql = "hccpg"; // banco de dados
//$username_MySql = "root"; // Usuario
//$password_MySql = "";  // senha*/

//estabelecemos conexão com o banco de dados
$conn = mysqli_connect($hostname_MySql,$username_MySql,$password_MySql,$database_MySql) or die(mysql_error());

#seleciona o banco de dados
#mysqli_select_db($database_MySql) or die(mysql_error());

return $conn;