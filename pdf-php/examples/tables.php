<?php

date_default_timezone_set('UTC');

include_once '../src/Cezpdf.php';
$pdf = new CezPDF('a4');

if (strpos(PHP_OS, 'WIN') !== false) {
    $pdf->tempPath = 'C:/temp';
}

$pdf->selectFont('Helvetica');

// Dados
$data = array(
	array('hora' => 10, 'prescricao' => 'AAAAAAAAAAAAAAAAAAAAAAAAAAAA'),
	array('hora' => 20, 'prescricao' => 'BBBBBBBBBBBBBBBBBBBBBBBBBBBB'),
	array('hora' => 13, 'prescricao' => 'CCCCCCCCCCCCCCCCCCCCCCCCCCCC'),
	array('hora' => 14, 'prescricao' => 'DDDDDDDDDDDDDDDDDDDDDDDDDDDD'),
	array('hora' => 15, 'prescricao' => 'EEEEEEEEEEEEEEEEEEEEEEEEEEEE'),
);
//Linha de Titulo
$cols = array('hora' => '<b>HORA</b>', 'prescricao' => '<b>PRESCRIÇÃO</b>');
//Ajustes
$coloptions = array('hora' => array('justification' => 'center'),'prescricao' => array('justification' => 'center'));
$j = 0;
//Próxima Página
if (!($j % 5) && $j != 0) {
    $pdf->ezNewPage();
}
//Linhas
$pdf->ezTable($data, $cols, '', array('showHeadings' => 1, 'shaded' => 1, 'gridlines' => 22, 'cols' => $coloptions,
				'innerLineThickness' => 0.5, 'outerLineThickness' => 3));
++$j;
//Gerar PDF
if (isset($_GET['d']) && $_GET['d']) {
    echo $pdf->ezOutput(true);
} else {
    $pdf->ezStream();
}
