<?php
	//Acesso aos dados do banco
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
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	//Perform queries 
	$cod_pac = $_POST['nome'];
	$data = $_POST['data'];
	$sqlI = "SELECT 
				tb_pacientes.pac_codigo as codigo,
				tb_pacientes.pac_nome as nome,
				tb_pacientes.pac_idade as idade,
				tb_sexos.sex_sexo as sexo,
				tb_prescricoes.pre_data as data,
				tb_prescricoes.pre_hora as horaM,
				tb_prescricoes.pre_prescricao as prescricaoM
			FROM
				tb_pacientes
			INNER JOIN
				tb_prescricoes
			ON 
				tb_pacientes.pac_codigo = tb_prescricoes.pre_pac_cod
			INNER JOIN
				tb_sexos
			ON 
				tb_pacientes.pac_sex_cod = tb_sexos.sex_codigo
			WHERE
				tb_pacientes.pac_codigo = '$cod_pac'
			AND
				tb_prescricoes.pre_data = '$data';";
					
	$queryIn = mysqli_query($con,$sqlI);

	//PDF
	date_default_timezone_set('UTC');
   
    //Inclui a classe 'class.ezpdf.php'
    include("pdf-php/src/Cezpdf.php");

    //Instancia um novo documento com o nome de pdf
    $pdf = new Cezpdf('a4'); 
   
	if (strpos(PHP_OS, 'WIN') !== false) {
		$pdf->tempPath = 'C:/temp';
	}else{
		if (strpos(PHP_OS, 'LINUX') !== false) {
			$pdf->tempPath = '/tmp';
		}
	}

    //Seleciona a fonte
    $pdf -> selectFont('pdf-php/src/fonts/Helvetica.afm'); 

    $pdf->ezText(
		'Policia Militar do Estado do Rio Grande do Norte
		Hopital Central Coronel Pedro Germano
		Atendimento Médico',
		12, array(justification => 'center', null)); 
   
    $pdf->ezText('
	
	
	Prescrição Médica', 18, array(justification => 'center', null)); 
   
	$pacienteD = mysqli_fetch_array($queryIn);					
   
	$pdf->ezText('
	
	
	<b>Nome Paciente:</b> '. $pacienteD['nome']. '     <b>Idade:</b> '. $pacienteD['idade'] 
					.' anos     <b>Data:</b> '. $pacienteD['data'].'
					'
				, 13, array(justification => 'center', null)); 
    
	//Tabela
	$queryInI = mysqli_query($con,$sqlI);
	// Dados
	$datas = array();
	$data = array();
	$i = 0;
	while($paciente = mysqli_fetch_array($queryInI)) {
		$datas[$i++] = array('prescricao' => $paciente['prescricaoM'], 'hora1' => '           ', 'hora2' => '           ',
				'hora3' => '           ', 'hora4' => '           ', 'hora5' => '           ', 'hora6' => '           ',
				'obs' => '                                 ' );
	}
	$data = $datas;
	//Linha de Titulo
	$cols = array('prescricao' => '<b>PRESCRIÇÃO</b>', 'hora1' => '<b>HORA</b>', 'hora2' => '<b>HORA</b>', 'hora3' => '<b>HORA</b>',
			'hora4' => '<b>HORA</b>', 'hora5' => '<b>HORA</b>', 'hora6' => '<b>HORA</b>', 'obs' => '<b>OBSERVAÇÃO</b>');
	//Ajustes
	$coloptions = array('hora' => array('justification' => 'center'),'prescricao' => array('justification' => 'center'));
	$j = 0;
	//Próxima Página
	if (!($j % 5) && $j != 0) {
		$pdf->ezNewPage();
	}
	//Linhas
	$pdf->ezTable($data, $cols, '', array('showHeadings' => 1, 'shaded' => 1, 'gridlines' => 23, 'cols' => $coloptions,
					'innerLineThickness' => 0.5, 'outerLineThickness' => 3));
	++$j;
	//Gerar PDF
	if (isset($_GET['d']) && $_GET['d']) {
		echo $pdf->ezOutput(true);
	} else {
		$pdf->ezStream();
	}
	
	//Fechar Conexão
	mysqli_close($con);
?>