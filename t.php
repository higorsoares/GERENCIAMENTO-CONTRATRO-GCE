
<?php
require 'classes/quantidade.class.php';
	$quantidade = new Quantidade();
$ret = $quantidade->AltQuantidade(2,50,10);
//$ret = $cont->ListaDate('2019-06-09','2019-06-13');
 
 

//header('Content-Type: application/json');
echo json_encode($ret);


