<?php
	//Variaveis Globais
	$con;
	$logado;
	$result;
	$query;
	$data;

	//Conectar ao banco
	function conectar(){
		//$hostname_MySql = "us-cdbr-iron-east-05.cleardb.net";  // Servidor
		//$database_MySql = "heroku_3e2f3c7b538415b"; // banco de dados
		//$username_MySql = "bf1886c2887a04"; // Usuario
		//$password_MySql = "52d302f7";  // senha
		$hostname_MySql = "localhost";  // Servidor
		$database_MySql = "hccpg"; // banco de dados
		$username_MySql = "root"; // Usuario
		$password_MySql = "";  // senha*/

		$GLOBALS['con'] = mysqli_connect($hostname_MySql,$username_MySql,$password_MySql,$database_MySql);

		//Verifica conexão
		if (mysqli_connect_errno()) {
		  echo "Falha ao conectar ao banco: " . mysqli_connect_error();
		}

		return $GLOBALS['con'];
	}

	//Verifica se a sessão existe
	function verificarSessão() {
		session_start();
		if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
			unset($_SESSION['login']);
			unset($_SESSION['senha']);
			header('location:index.php');
		}
		$GLOBALS['logado'] = $_SESSION['login'];
	}

	/*function sair(){
		session_start();
		if($_SESSION['login']){
			session_destroy();
			header('location:index.php');
			exit;
		}
	}*/

	//Buscar nomes dos pacientes	
	function alimentarComboboxPaciente(){
		$con = conectar();

		$query = mysqli_query($con,"SELECT pac_codigo, pac_nome FROM tb_pacientes order by pac_nome");

		while($paciente = mysqli_fetch_array($query)) {
			echo "<option value=" .$paciente['pac_codigo']. ">" .$paciente['pac_nome']. "</option>";
		}
	}
	
	//Pegar data de hoje
	function pegarData(){
		date_default_timezone_set('America/Sao_Paulo');
		$GLOBALS['date'] = date('d/m/Y');
	}
	//Fechar conexao
	function fecharConexao($con){
		mysqli_close($con);
	}
?>
