<?php
require 'Api/api.class.php';

$cont = new Api();

	$dataInicio = $_POST['txtDataInicio'];
	$dataFim = $_POST['txtDataFim'];

	
$ret = $cont->ListaDate($dataInicio,$dataFim);
//$ret = $cont->ListaDate('2019-06-09','2019-06-13');
 
 

//header('Content-Type: application/json');
echo json_encode($ret);

?>