<?php
	include("jdbc.php");
	$con = conectar();
	//inicia a sessão
	session_start();
	
	//Pega o login e a senha da página index.php
	$login	= $_POST['login'];
	$senha = $_POST['senha'];

	//Query para verificar a existencia do login e senha do usuário no banco	
	$sql="select usu_nome from tb_usuarios where usu_login = '$login' and usu_senha = '$senha';";

	//Recebe o resltado da pesquisa
	$result = mysqli_query($con,$sql);
	
	//Se $result = 0 deu certo se for igual a 1 deu erro
	if(mysqli_num_rows($result)>0){
		$_SESSION['login'] = $login;
		$_SESSION['senha'] = $senha;
		header('location:../menu.php');
	}else{
		unset($_SESSION['login']);
		unset($_SESSION['senha']);
		header('location:../index.php');
	}
?>