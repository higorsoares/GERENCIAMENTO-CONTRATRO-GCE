<?php
require 'classes/contrato.class.php';
require 'Api/api.class.php';


$lista = new Api();

$ret = $lista->ListaDate('2019-06-18','2019-06-19');

var_dump($ret);

/*
session_start();
$cont = new Contrato();


$cont->cadastroContrato('igor soares','123456','igor soares','3899521409','3899521409','ior@gmail.com','MG','alagoinhas','teste','rua teste ','35','6','1','5000','5000');


var_dump($cont);
*/

?>

 